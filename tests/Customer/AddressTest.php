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

namespace Gpupo\Tests\SteloSdk\Customer;

use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\Tests\SteloSdk\EntityTestCaseAbstract;

class AddressTest extends EntityTestCaseAbstract
{
    const QUALIFIED = '\Gpupo\SteloSdk\Customer\Address';

    public static function setUpBeforeClass()
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();
    }

    public function dataProviderObject()
    {
        $expected = [
            'alias' => 'Home',
            'street' => 'Sesame',
            'number' => '132',
            'complement' => 'Red Horse',
            'neighborhood' => 'TV',
            'zipCode' => '070090-222',
            'city' => 'Fantasy Island',
            'state' => 'Triangle',
            'country' => 'Bermudas',
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }

    /**
     * @testdox Possui método ``getAlias()`` para acessar Alias
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterAlias(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('alias', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setAlias()`` que define Alias
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterAlias(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('alias', 'string', $object);
    }

    /**
     * @testdox Possui método ``getStreet()`` para acessar Street
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterStreet(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('street', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setStreet()`` que define Street
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterStreet(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('street', 'string', $object);
    }

    /**
     * @testdox Possui método ``getNumber()`` para acessar Number
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterNumber(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('number', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setNumber()`` que define Number
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterNumber(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('number', 'string', $object);
    }

    /**
     * @testdox Possui método ``getComplement()`` para acessar Complement
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterComplement(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('complement', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setComplement()`` que define Complement
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterComplement(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('complement', 'string', $object);
    }

    /**
     * @testdox Possui método ``getNeighborhood()`` para acessar Neighborhood
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterNeighborhood(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('neighborhood', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setNeighborhood()`` que define Neighborhood
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterNeighborhood(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('neighborhood', 'string', $object);
    }

    /**
     * @testdox Possui método ``getZipCode()`` para acessar ZipCode
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterZipCode(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('zipCode', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setZipCode()`` que define ZipCode
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterZipCode(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('zipCode', 'string', $object);
    }

    /**
     * @testdox Possui método ``getCity()`` para acessar City
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterCity(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('city', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setCity()`` que define City
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterCity(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('city', 'string', $object);
    }

    /**
     * @testdox Possui método ``getState()`` para acessar State
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterState(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('state', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setState()`` que define State
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterState(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('state', 'string', $object);
    }

    /**
     * @testdox Possui método ``getCountry()`` para acessar Country
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterCountry(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('country', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setCountry()`` que define Country
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterCountry(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('country', 'string', $object);
    }

}
