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

namespace Gpupo\Tests\SteloSdk\Customer\Phone;

use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\Tests\SteloSdk\EntityTestCaseAbstract;

class ItemTest extends EntityTestCaseAbstract
{
    const QUALIFIED = '\Gpupo\SteloSdk\Customer\Phone\Item';

    public static function setUpBeforeClass()
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();
    }

    public function dataProviderObject()
    {
        $expected = [
            'phoneType' => 'LANDLINE',
            'number'    => '41 99872774',
            'type'      => 1,
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }

    /**
     * @testdox Possui método getPhoneType() para acessar PhoneType
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterPhoneType(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('phoneType', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método setPhoneType() que define PhoneType
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterPhoneType(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('phoneType', 'string', $object);
    }

    /**
     * @testdox Possui método getNumber() para acessar Number
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterNumber(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('number', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método setNumber() que define Number
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterNumber(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('number', 'string', $object);
    }

    /**
     * @testdox Possui método getType() para acessar Type
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterType(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('type', 'number', $object, $expected);
    }

    /**
     * @testdox Possui método setType() que define Type
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterType(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('type', 'number', $object);
    }
}
