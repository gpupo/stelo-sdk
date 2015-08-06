<?php

/*
 * This file is part of gpupo/stelo-sdk
 *
 * (c) Gilmar Pupo <g@g1mr.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * For more information, see
 * <http://www.g1mr.com/stelo-sdk/>.
 */

namespace Gpupo\SteloSdk\Auth;

use Gpupo\SteloSdk\ManagerAbstract;
use Gpupo\CommonSdk\Traits\PlaceholderTrait;
use Gpupo\Common\Interfaces\OptionsInterface;
use Gpupo\Common\Traits\OptionsTrait;
use Gpupo\CommonSdk\Map;
use Gpupo\CommonSdk\Response;

/**
 * Gerenciamento da autenticação do Cliente
 */
class Manager extends ManagerAbstract implements OptionsInterface
{
    use PlaceholderTrait;
    use OptionsTrait;

    protected $token;

    protected $endpoint = 'https://{login_version}.stelo.com.br/sso/auth/v1/oauth2';

    /**
     * Token utilizado para proteção contra CSRF
     *
     * Deve ser adicionado à Session do Cliente e comparado na avaliação
     * do Retorno da autenticação
     *
     * @return string Token de 12 caracteres
     */
    public function getCsrfToken()
    {
        if (empty($this->token)) {
            $this->token = substr(sha1(openssl_random_pseudo_bytes(32)), 0, 12);
        }

        return $this->token;
    }

    public function getDefaultOptions()
    {
        return  [
            'redirect_url'  => 'https://www.example.com/notify',
            'response_type' => 'code',
            'state'         => $this->getCsrfToken(),
            'scope'         => 'user_profile.all',
            'login_version' => 'login',
        ];
    }

    protected function appendParamsToUri($uri, Array $params)
    {
        foreach($params as $param) {
            $uri .= $param.'={'.$param.'}&';
        }
        return rtrim($uri,'&');
    }

    public function getAuthorizeUrl()
    {
        $uri = $this->appendParamsToUri($this->endpoint.'/autorize?',
            ['client_id', 'response_type', 'state', 'scope', 'redirect_url']);

        return $this->fillPlaceholdersWithArray($uri, $this->getOptions()->toArray());
    }

    protected function factoryToken(Response $response)
    {
        return new Token($response->getData()->toArray());
    }

    public function requestToken($access_token)
    {
        $map = new Map(['post', $this->endpoint.'/token'], $this->getOptions()->toArray());

        $body = [
            'code'          => $access_token,
            'grant_type'    => 'authorizaton_code',
        ];

        foreach(['client_id', 'client_secret', 'redirect_url'] as $key) {
            $body[$key] = $this->getOptions()->get($key);
        }

        $response =  $this->execute($map, $body);

        if ($response->getHttpStatusCode() === 200) {
            return $this->factoryToken($response);
        }
    }
}
