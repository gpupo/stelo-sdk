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
use \Gpupo\SteloSdk\Auth\Token;

class TokenTest extends EntityTestCaseAbstract
{
    public static function setUpBeforeClass()
    {
        static::setFullyQualifiedObject('\Gpupo\SteloSdk\Auth\Token');
        static::setUpEntityTest();
        parent::setUpBeforeClass();
    }
    
    public function dataProviderObject()
    {
        $expected = [
            'access_token'  => 'foo',
            'token_type'    => 'bar',
            'expires_in'    => 1,
            'scope'         => 'zeta',
            'state'         => 'jones',
        ];

        return [[
            new Token($expected),
            $expected
        ]];
    }

    /**
     * @dataProvider dataProviderObject
     */
    public function testPossuiGetterParaAccessToken(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('access_token', 'string', $object, $expected);
    }

   /**
     * @dataProvider dataProviderObject
     */
    public function testPossuiGetterParaTokenType(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('token_type', 'string', $object, $expected);
    }

   /**
     * @dataProvider dataProviderObject
     */
    public function testPossuiGetterParaExpiresIn(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('expires_in', 'number', $object, $expected);
    }

   /**
     * @dataProvider dataProviderObject
     */
    public function testPossuiGetterParaScope(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('scope', 'string', $object, $expected);
    }

   /**
     * @dataProvider dataProviderObject
     */
    public function testPossuiGetterParaState(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('state', 'string', $object, $expected);
    }

}
