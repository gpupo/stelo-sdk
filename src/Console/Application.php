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

namespace Gpupo\SteloSdk\Console;

use Gpupo\CommonSdk\Console\AbstractApplication;
use Gpupo\SteloSdk\Factory;

class Application extends AbstractApplication
{
    protected $commonParameters = [
        [
            'key'   => 'client_id',
        ],
        [
            'key'   => 'client_secret',
        ],
        [
            'key'       => 'env',
            'options'   => ['sandbox', 'api'],
            'default'   => 'sandbox',
            'name'      => 'Version',
        ],
        [
            'key'       => 'protocol',
            'options'   => ['http', 'https'],
            'default'   => 'https',
            'name'      => 'Protocol',
        ],
        [
            'key'       => 'sslVersion',
            'options'   => ['SecureTransport', 'TLS'],
            'default'   => 'SecureTransport',
            'name'      => 'SSL Version',
        ],
        [
            'key'       => 'registerPath',
            'default'   => false,
        ]
    ];

    public function factorySdk(array $options)
    {
        $options['version'] = $options['env'];

        return  Factory::getInstance()->setup($options, $this->factoryLogger());
    }
}
