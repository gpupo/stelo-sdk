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

use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\SteloSdk\Transaction\Transaction;
use Gpupo\Tests\SteloSdk\EntityTestCaseAbstract;

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
class TransactionTest extends EntityTestCaseAbstract
{
    const QUALIFIED = '\Gpupo\SteloSdk\Transaction\Transaction';

    public static function setUpBeforeClass()
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();
    }

    public function dataProviderObject()
    {
        $expected = [
            'id'            => 1,
            'statusCode'    => 'N',
            'statusMessage' => 'Cancelada',
            'freight'       => 9,
            'amount'        => 134.9,
            'checkoutUrl'   => 'https://www.example.com',
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }

    public function testPossuiId()
    {
        $transaction = new Transaction([
            'id'            => 1,
            'statusCode'    => 'N',
            'statusMessage' => 'Cancelada',
            'freight'       => 9,
            'amount'        => 134.9,
            'checkoutUrl'   => 'https://www.example.com',
        ]);

        $this->assertSame(1, $transaction->getId());

        return $transaction;
    }

    /**
     * @depends testPossuiId
     */
    public function testPossuiUrlDeCheckout(Transaction $transaction)
    {
        $this->assertSame('https://www.example.com', $transaction->getCheckoutUrl());
    }

    /**
     * @depends testPossuiId
     */
    public function testPossuiStatusCode(Transaction $transaction)
    {
        $this->assertSame('N', $transaction->getStatusCode());
    }

    /**
     * @depends testPossuiId
     */
    public function testPossuiIdentificaçãoDeSituaçãoAtual(Transaction $transaction)
    {
        $this->assertSame('Cancelada', $transaction->getStatusMessage());
    }

    /**
     * @depends testPossuiId
     */
    public function testPossuiValorDaTransação(Transaction $transaction)
    {
        $this->assertSame(134.90, $transaction->getAmount());
    }

    /**
     * @depends testPossuiId
     */
    public function testPossuiValorDeFrete(Transaction $transaction)
    {
        $this->assertSame(9, $transaction->getFreight());
    }

    /**
     * @testdox Possui método ``getId()`` para acessar Id
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterId(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('id', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setId()`` que define Id
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterId(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('id', 'string', $object);
    }

    /**
     * @testdox Possui método ``getStatusCode()`` para acessar StatusCode
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterStatusCode(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('statusCode', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setStatusCode()`` que define StatusCode
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterStatusCode(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('statusCode', 'string', $object);
    }

    /**
     * @testdox Possui método ``getStatusMessage()`` para acessar StatusMessage
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterStatusMessage(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('statusMessage', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setStatusMessage()`` que define StatusMessage
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterStatusMessage(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('statusMessage', 'string', $object);
    }

    /**
     * @testdox Possui método ``getFreight()`` para acessar Freight
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterFreight(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('freight', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setFreight()`` que define Freight
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterFreight(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('freight', 'string', $object);
    }

    /**
     * @testdox Possui método ``getAmount()`` para acessar Amount
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterAmount(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('amount', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setAmount()`` que define Amount
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterAmount(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('amount', 'string', $object);
    }

    /**
     * @testdox Possui método ``getCheckoutUrl()`` para acessar CheckoutUrl
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterCheckoutUrl(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('checkoutUrl', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setCheckoutUrl()`` que define CheckoutUrl
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterCheckoutUrl(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('checkoutUrl', 'string', $object);
    }
}
