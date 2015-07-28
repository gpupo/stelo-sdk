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

namespace Gpupo\Tests\SteloSdk\Transaction;

use Gpupo\SteloSdk\Transaction\Transaction;
use Gpupo\Tests\SteloSdk\TestCaseAbstract;

class ManagerTest extends TestCaseAbstract
{
    public function testÉUsadoParaCriarUmaNovaTransação()
    {
        $manager = $this->getFactory()->factoryManager('transaction');
        $order = $this->factoryOrder();
        $transaction = $manager->createFromOrder($order);
        $this->assertInstanceOf('\Gpupo\SteloSdk\Transaction\Transaction', $transaction);
    }
}
