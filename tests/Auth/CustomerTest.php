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

namespace Gpupo\Tests\SteloSdk\Auth;

use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\Tests\SteloSdk\EntityTestCaseAbstract;

class CustomerTest extends EntityTestCaseAbstract
{
    const QUALIFIED = '\Gpupo\SteloSdk\Auth\Customer';

    public static function setUpBeforeClass()
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();
    }

    public function dataProviderObject()
    {
        $expected = [
            'customerName'  => 'Jim',
            'customerEmail' => 'jim@example.com',
            'birthDate'     => '12/12/1965',
            'gender'        => 'M',
            'phone'         => [],
            'cpf'           => '88328663111',
            'rg'            => '66666666656',
            'address'       => [],
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
     * @testdox Possui método getCpf() para acessar Cpf
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterCpf(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('cpf', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método setCpf() que define Cpf
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterCpf(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('cpf', 'string', $object);
    }

    /**
     * @testdox Possui método getRg() para acessar Rg
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterRg(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('rg', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método setRg() que define Rg
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterRg(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('rg', 'string', $object);
    }

    /**
     * @testdox Possui método getAddress() para acessar Address
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterAddress(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('address', 'object', $object, $expected);
    }

    /**
     * @testdox Possui método setAddress() que define Address
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterAddress(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('address', 'object', $object);
    }
}
