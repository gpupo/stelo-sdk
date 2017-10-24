<?php

/*
 * This file is part of gpupo/stelo-sdk
 * Created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <https://opensource.gpupo.com/>.
 */

namespace Gpupo\SteloSdk\Auth;

use Gpupo\Common\Interfaces\OptionsInterface;
use Gpupo\Common\Traits\OptionsTrait;
use Gpupo\CommonSdk\Map;
use Gpupo\CommonSdk\Response;
use Gpupo\CommonSdk\Traits\PlaceholderTrait;
use Gpupo\SteloSdk\ManagerAbstract;

/**
 * Gerenciamento da autenticação do Cliente.
 */
class Manager extends ManagerAbstract implements OptionsInterface
{
    use PlaceholderTrait;
    use OptionsTrait;

    protected $token;

    protected $endpoint = 'https://{login_version}.stelo.com.br/sso/auth/v1/oauth2';

    /**
     * Token utilizado para proteção contra CSRF.
     *
     * Deve ser adicionado à Session do Cliente e comparado na avaliação
     * do Retorno da autenticação
     *
     * @return string Token de 12 caracteres
     */
    public function getCsrfToken()
    {
        if (empty($this->token)) {
            $this->token = substr(sha1(openssl_random_pseudo_bytes(32)), 0, 9);
        }

        return $this->token;
    }

    public function getDefaultOptions()
    {
        return  [
            'redirect_url'  => 'https://www.example.com/notify',
            'response_type' => 'code',
            'state'         => $this->getCsrfToken(),
            'scope'         => 'resource.READ',
            'login_version' => 'login',
        ];
    }

    protected function appendParamsToUri($uri, array $params)
    {
        foreach ($params as $param) {
            $uri .= $param.'={'.$param.'}&';
        }

        return rtrim($uri, '&');
    }

    public function getAuthorizeUrl()
    {
        $uri = $this->appendParamsToUri(
            $this->endpoint.'/authorize?',
            ['response_type', 'client_id', 'redirect_url', 'scope', 'state']
        );

        return $this->fillPlaceholdersWithArray($uri, $this->getOptions()->toArray());
    }

    protected function factoryToken(Response $response)
    {
        return new Token($response->getData()->toArray());
    }

    protected function factoryCustomer(Response $response)
    {
        $data = $response->getData()->toArray();

        return new Customer($data);
    }

    protected function resolvPoint($path)
    {
        if (in_array($path, ['/token', '/customer'], true)) {
            if ($this->getOptions()->get('login_version') === 'login.hml') {
                return 'http://200.142.203.223/sso/auth/v1/oauth2'.$path;
            } else {
                return 'https://api.stelo.com.br/sso/auth/v1/oauth2'.$path;
            }
        }

        return $this->endpoint.$path;
    }

    protected function requestResponseFromPath($path, $body = null, $mode = 'json')
    {
        $method = empty($body) ? 'get' : 'post';
        $options = $this->getOptions()->toArray();
        $options['mode'] = $mode;
        $endpoint = $this->fillPlaceholdersWithArray($this->resolvPoint($path), $options);
        $map = new Map([$method, $endpoint], $options);

        $response = $this->execute($map, $body);

        if ($response->getHttpStatusCode() !== 200) {
            //Lidar com erros
            return;
        }

        return $response;
    }

    public function requestToken($code)
    {
        $body = [
            'grant_type' => 'authorization_code',
            'code'       => $code,
        ];

        foreach (['client_id', 'client_secret'] as $key) {
            $body[$key] = $this->getOptions()->get($key);
        }

        $body['redirect_uri'] = $this->getOptions()->get('redirect_url');

        $response = $this->requestResponseFromPath('/token', $body, 'form');

        if ($response) {
            return $this->factoryToken($response);
        }
    }

    public function requestCustomer(Token $token)
    {
        $this->getClient()->setAuthorizationMode('Bearer '.$token->getAccessToken());

        return $this->factoryCustomer($this->requestResponseFromPath('/customer'));
    }
}
