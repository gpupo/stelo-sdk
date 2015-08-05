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
                'class'     => $namespace.'Order\Order',
            ],
            'lightbox' => [
                'class'     => $namespace.'View\Lightbox',
            ],
            'transaction' => [
                'class'     => $namespace.'Transaction\Transaction',
                'manager'   => $namespace.'Transaction\Manager',
            ],
            'auth' => [
                'manager'   => $namespace.'Auth\Manager',
            ],

        ];
    }
}
