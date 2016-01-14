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
        $manager->setDryRun($this->factoryResponseFromFixture('fixtures/transaction.json'));
        $order = $this->factoryOrder();
        $transaction = $manager->createFromOrder($order);
        $this->assertInstanceOf('\Gpupo\SteloSdk\Transaction\Transaction', $transaction);
        $this->assertSame(143800700149312, $transaction->getId());
        $this->assertSame('https://carteira.hml.stelo.com.br/comprador/checkout?orderId=7K4PRkBxOdzx_9WZ8vioZQ', $transaction->getCheckoutUrl());
    }

    public function testPermiteConsultaAUmaTransaçãoEspecífica()
    {
        $manager = $this->getFactory()->factoryManager('transaction');
        $manager->setDryRun($this->factoryResponseFromFixture('fixtures/transaction.status.json'));
        $transaction = $manager->findById(143800246128360);
        $this->assertInstanceOf('\Gpupo\SteloSdk\Transaction\Transaction', $transaction);
        $this->assertSame(143800246128360, $transaction->getId());
    }

    public function testPermiteOCancelamentoDeUmaTransaçãoEspecífica()
    {
        $manager = $this->getFactory()->factoryManager('transaction');
        $manager->setDryRun($this->factoryResponseFromFixture('fixtures/transaction.delete.json'));
        $this->assertTrue($manager->deleteById(143285031080465));
    }

    public function testFalhaAoTentarCancelarUmaTransaçãoInexistenteOuEmSituaçãoQueNãoPermitaTalOperação()
    {
        $manager = $this->getFactory()->factoryManager('transaction');
        $manager->setDryRun($this->factoryResponseFromFixture('fixtures/transaction.delete-error.json'));
        $this->assertFalse($manager->deleteById(143285031080465));
    }
}
