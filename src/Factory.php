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

namespace Gpupo\SteloSdk;

use Gpupo\CommonSdk\FactoryAbstract;
use Gpupo\SteloSdk\Client\Client;

class Factory extends FactoryAbstract
{
    public function setClient(array $clientOptions = [])
    {
        $this->client = new Client($clientOptions, $this->logger);
    }

    public function getNamespace()
    {
        return '\Gpupo\SteloSdk\\';
    }

    protected function getSchema($namespace = null)
    {
        return [
            'order' => [
                'class' => $namespace.'Order\Order',
            ],
            'lightbox' => [
                'class' => $namespace.'View\Lightbox',
            ],
            'token' => [
                'class' => $namespace.'Auth\Token',
            ],
            'transaction' => [
                'class'   => $namespace.'Transaction\Transaction',
                'manager' => $namespace.'Transaction\Manager',
            ],
            'auth' => [
                'manager' => $namespace.'Auth\Manager',
            ],

        ];
    }
}
