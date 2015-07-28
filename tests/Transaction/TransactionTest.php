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

/**
 * @method string getId()
 * @method setId(string $id)
 * @method string getStatusCode()
 * @method setStatusCode(string $statusCode)
 * @method string getStatusMessage()
 * @method setStatusMessage(string $statusMessage)
 * @method string getFreight()
 * @method setFreight(string $freight)
 * @method string getAmount()
 * @method setAmount(string $amount)
 */
class TransactionTest extends TestCaseAbstract
{
    public static function setUpBeforeClass()
    {
        self::displayClassDocumentation(new Transaction());
    }

    public function testPossuiId()
    {
        $transaction = new Transaction([
            'id'            => 1,
            'statusCode'    => 'N',
            'statusMessage' => 'Cancelada',
            'freight'       => 9,
            'amount'        => 134.9,
        ]);

        $this->assertEquals(1, $transaction->getId());

        return $transaction;
    }

    /**
     * @depends testPossuiId
     */
    public function testPossuiStatusCode(Transaction $transaction)
    {
        $this->assertEquals('N', $transaction->getStatusCode());
    }

    /**
     * @depends testPossuiId
     */
    public function testPossuiIdentificaçãoDeSituaçãoAtual(Transaction $transaction)
    {
        $this->assertEquals('Cancelada', $transaction->getStatusMessage());
    }

    /**
     * @depends testPossuiId
     */
    public function testPossuiValorDaTransação(Transaction $transaction)
    {
        $this->assertEquals(134.90, $transaction->getAmount());
    }

    /**
     * @depends testPossuiId
     */
    public function testPossuiValorDeFrete(Transaction $transaction)
    {
        $this->assertEquals(9, $transaction->getFreight());
    }
}
