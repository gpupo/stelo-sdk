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

namespace Gpupo\Tests\SteloSdk\Customer\Phone;

use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\SteloSdk\Customer\Phone\Item;
use Gpupo\Tests\SteloSdk\EntityTestCaseAbstract;

class ItemTest extends EntityTestCaseAbstract
{
    public function dataProviderObject()
    {
        return $this->dataProviderEntitySchema(Item::class);
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
