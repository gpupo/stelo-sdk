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

namespace Gpupo\Tests\SteloSdk\Auth;

use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\SteloSdk\Auth\Token;
use Gpupo\Tests\SteloSdk\EntityTestCaseAbstract;

class TokenTest extends EntityTestCaseAbstract
{
    public function dataProviderObject()
    {
        return $this->dataProviderEntitySchema(Token::class);
    }

    /**
     * @testdox Possui método getAccessToken() para acessar AccessToken
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterAccessToken(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('access_token', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método setAccessToken() que define AccessToken
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterAccessToken(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('access_token', 'string', $object);
    }

    /**
     * @testdox Possui método getTokenType() para acessar TokenType
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterTokenType(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('token_type', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método setTokenType() que define TokenType
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterTokenType(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('token_type', 'string', $object);
    }

    /**
     * @testdox Possui método getExpiresIn() para acessar ExpiresIn
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterExpiresIn(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('expires_in', 'number', $object, $expected);
    }

    /**
     * @testdox Possui método setExpiresIn() que define ExpiresIn
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterExpiresIn(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('expires_in', 'number', $object);
    }

    /**
     * @testdox Possui método getScope() para acessar Scope
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterScope(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('scope', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método setScope() que define Scope
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterScope(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('scope', 'string', $object);
    }

    /**
     * @testdox Possui método getState() para acessar State
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterState(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('state', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método setState() que define State
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterState(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('state', 'string', $object);
    }
}
