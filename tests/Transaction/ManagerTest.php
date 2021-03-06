<?php

/*
 * This file is part of gpupo/stelo-sdk
 * Created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <https://opensource.gpupo.com/>.
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
