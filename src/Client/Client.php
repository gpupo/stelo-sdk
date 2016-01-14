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

namespace Gpupo\SteloSdk\Client;

use Gpupo\CommonSdk\Client\ClientAbstract;
use Gpupo\CommonSdk\Client\ClientInterface;

class Client extends ClientAbstract implements ClientInterface
{
    protected $authorizationMode = 'basic';

    public function setAuthorizationMode($string)
    {
        $this->authorizationMode = $string;

        return $this;
    }

    public function getAuthorizationMode()
    {
        return $this->authorizationMode;
    }

    public function getDefaultOptions()
    {
        return [
            'client_id'     => false,
            'client_secret' => false,
            'base_url'      => '{PROTOCOL}://{VERSION}.stelo.com.br/ec/V1',
            'protocol'      => 'http',
            'version'       => 'sandbox',
            'verbose'       => false,
            'sslVersion'    => 'SecureTransport',
            'cacheTTL'      => 3600,
            'sslVerifyPeer' => true,
        ];
    }

    protected function renderAuthorization()
    {
        $mode = $this->getAuthorizationMode();
        if ($mode !== 'basic') {
            $this->setAuthorizationMode('basic');
            $string = $mode;
        } else {
            $string = $this->basicAuthorization();
        }

        return 'Authorization: ' . $string;
    }

    protected function basicAuthorization()
    {
        foreach (['client_id', 'client_secret'] as $key) {
            $value = $this->getOptions()->get($key);
            if (empty($value)) {
                throw new \InvalidArgumentException('[' . $key . '] ausente!');
            }
        }

        return 'Basic ' . base64_encode($this->getOptions()->get('client_id') . ':' . $this->getOptions()->get('client_secret'));
    }
}
