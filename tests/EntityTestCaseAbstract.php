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

namespace Gpupo\Tests\SteloSdk;

abstract class EntityTestCaseAbstract extends TestCaseAbstract
{
    protected static $name = '';

    public static function getFullyQualifiedObject()
    {
        return self::$name;
    }

    public static function createObject()
    {
        $className = static::getFullyQualifiedObject();;

        return new $className;
    }

    public static function setUpBeforeClass()
    {
        self::displayClassDocumentation(static::createObject());
    }

    public function testPossuiSchema()
    {
        $this->assertInstanceOf(self::getFullyQualifiedObject(), self::createObject());
    }
}
