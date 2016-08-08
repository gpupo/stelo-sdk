<?php

/*
 * This file is part of gpupo/stelo-sdk
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <http://www.g1mr.com/>.
 */

namespace Gpupo\SteloSdk\Console;

use Gpupo\CommonSdk\Console\AbstractApplication;
use Gpupo\SteloSdk\Factory;

class Application extends AbstractApplication
{
    protected $commonParameters = [
        [
            'key' => 'client_id',
        ],
        [
            'key' => 'client_secret',
        ],
        [
            'key'     => 'env',
            'options' => ['sandbox', 'api'],
            'default' => 'sandbox',
            'name'    => 'Version',
        ],
        [
            'key'     => 'login_version',
            'options' => ['login', 'login.hml'],
            'default' => 'login.hml',
            'name'    => 'Version',
        ],
        [
            'key'     => 'protocol',
            'options' => ['http', 'https'],
            'default' => 'https',
            'name'    => 'Protocol',
        ],
        [
            'key'     => 'sslVersion',
            'options' => ['SecureTransport', 'TLS'],
            'default' => 'SecureTransport',
            'name'    => 'SSL Version',
        ],
        [
            'key'     => 'redirect_url',
            'default' => false,
        ],
        [
            'key'     => 'registerPath',
            'default' => false,
        ],
    ];

    public function factorySdk(array $options)
    {
        $options['version'] = $options['env'];

        return  Factory::getInstance()->setup($options, $this->factoryLogger());
    }
}
