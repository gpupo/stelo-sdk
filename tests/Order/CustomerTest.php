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

use Gpupo\Tests\SteloSdk\EntityTestCaseAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

class CustomerTest extends EntityTestCaseAbstract
{
    const QUALIFIED = '\Gpupo\SteloSdk\Order\Customer';

    public static function setUpBeforeClass()
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();
    }

    public function dataProviderObject()
    {
        $expected = [
            'customerName' => 'Barney',
            'customerEmail' => 'barney@dinossauro.com',
            'birthDate' => '10/10/1941',
            'gender' => 'M',
            'phone' => [],
            'customerIdentity' => '99388477572',
            'billingAddress' => [],
            'shippingAddress' => [],
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }

    /**
     * @testdox Possui método getCustomerName() para acessar CustomerName
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterCustomerName(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('customerName', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método setCustomerName() que define CustomerName
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterCustomerName(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('customerName', 'string', $object);
    }

    /**
     * @testdox Possui método getCustomerEmail() para acessar CustomerEmail
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterCustomerEmail(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('customerEmail', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método setCustomerEmail() que define CustomerEmail
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterCustomerEmail(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('customerEmail', 'string', $object);
    }

    /**
     * @testdox Possui método getBirthDate() para acessar BirthDate
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterBirthDate(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('birthDate', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método setBirthDate() que define BirthDate
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterBirthDate(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('birthDate', 'string', $object);
    }

    /**
     * @testdox Possui método getGender() para acessar Gender
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterGender(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('gender', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método setGender() que define Gender
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterGender(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('gender', 'string', $object);
    }

    /**
     * @testdox Possui método getPhone() para acessar Phone
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterPhone(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('phone', 'object', $object, $expected);
    }

    /**
     * @testdox Possui método setPhone() que define Phone
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterPhone(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('phone', 'object', $object);
    }

    /**
     * @testdox Possui método getCustomerIdentity() para acessar CustomerIdentity
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterCustomerIdentity(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('customerIdentity', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método setCustomerIdentity() que define CustomerIdentity
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterCustomerIdentity(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('customerIdentity', 'string', $object);
    }

    /**
     * @testdox Possui método getBillingAddress() para acessar BillingAddress
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterBillingAddress(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('billingAddress', 'object', $object, $expected);
    }

    /**
     * @testdox Possui método setBillingAddress() que define BillingAddress
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterBillingAddress(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('billingAddress', 'object', $object);
    }

    /**
     * @testdox Possui método getShippingAddress() para acessar ShippingAddress
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterShippingAddress(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('shippingAddress', 'object', $object, $expected);
    }

    /**
     * @testdox Possui método setShippingAddress() que define ShippingAddress
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterShippingAddress(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('shippingAddress', 'object', $object);
    }

}
