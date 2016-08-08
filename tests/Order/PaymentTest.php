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

namespace Gpupo\Tests\SteloSdk\Order;

use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\SteloSdk\Order\Payment;
use Gpupo\Tests\SteloSdk\EntityTestCaseAbstract;

class PaymentTest extends EntityTestCaseAbstract
{
    public function dataProviderObject()
    {
        return $this->dataProviderEntitySchema(Payment::class);
    }

    /**
     * @testdox Possui método getAmount() para acessar Amount
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterAmount(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('amount', 'number', $object, $expected);
    }

    /**
     * @testdox Possui método setAmount() que define Amount
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterAmount(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('amount', 'number', $object);
    }

    /**
     * @testdox Possui método getFreight() para acessar Freight
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterFreight(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('freight', 'number', $object, $expected);
    }

    /**
     * @testdox Possui método setFreight() que define Freight
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterFreight(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('freight', 'number', $object);
    }

    /**
     * @testdox Possui método getCurrency() para acessar Currency
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterCurrency(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('currency', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método setCurrency() que define Currency
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterCurrency(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('currency', 'string', $object);
    }

    /**
     * @testdox Possui método getMaxInstallment() para acessar MaxInstallment
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterMaxInstallment(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('maxInstallment', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método setMaxInstallment() que define MaxInstallment
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterMaxInstallment(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('maxInstallment', 'string', $object);
    }
}
