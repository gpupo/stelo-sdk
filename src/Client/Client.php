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
    public function getDefaultOptions()
    {
        return [
            'client_id'      => false,
            'client_secret'  => false,
            'base_url'       => '{PROTOCOL}://{VERSION}.stelo.com.br/ec/V1',
            'protocol'       => 'http',
            'version'        => 'sandbox',
            'verbose'        => false,
            'sslVersion'     => 'SecureTransport',
            'cacheTTL'       => 3600,
            'sslVerifyPeer'  => true,
        ];
    }

    protected function renderAuthorization()
    {
        $list = [];

        foreach (['client_id', 'client_secret'] as $key) {
            $value = $this->getOptions()->get($key);
            if (empty($value)) {
                throw new \InvalidArgumentException('['.$key.'] ausente!');
            }

            $list[] = $key.':'.$value;
        }

        return $list;
    }
}
