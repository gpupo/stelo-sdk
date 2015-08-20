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

namespace Gpupo\Tests\SteloSdk;

use Gpupo\SteloSdk\Factory;
use Gpupo\Tests\CommonSdk\FactoryTestAbstract;

class FactoryTest extends FactoryTestAbstract
{
    public $namespace =  '\Gpupo\SteloSdk\\';

    public function getFactory()
    {
        return Factory::getInstance();
    }

   /**
    * @dataProvider dataProviderManager
    */
   public function testCentralizaAcessoAManagers($objectExpected, $target)
   {
       return $this->assertInstanceOf($objectExpected,
           $this->createObject($this->getFactory(), 'factoryManager', $target));
   }

    public function dataProviderObjetos()
    {
        return [
            [$this->namespace . 'Order\Order', 'order', null],
            [$this->namespace . 'View\Lightbox', 'lightbox', null],
            [$this->namespace . 'Transaction\Transaction', 'transaction', null],
        ];
    }

    public function dataProviderManager()
    {
        return [
            [$this->namespace . 'Transaction\Manager', 'transaction'],
            [$this->namespace . 'Auth\Manager', 'auth'],
        ];
    }
}
