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

namespace Gpupo\Tests\SteloSdk\Order;

use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\Tests\SteloSdk\EntityTestCaseAbstract;

class PaymentTest extends EntityTestCaseAbstract
{
    const QUALIFIED = '\Gpupo\SteloSdk\Order\Payment';

    public static function setUpBeforeClass()
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();
    }

    public function dataProviderObject()
    {
        $expected = [
            'amount'         => '23',
            'freight'        => '2',
            'currency'       => 'BRL',
            'maxInstallment' => '3',
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
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
