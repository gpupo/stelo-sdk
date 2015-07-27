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

namespace Gpupo\Tests\SteloSdk\Client;

use Gpupo\Tests\SteloSdk\TestCaseAbstract;

class ClientTest extends TestCaseAbstract
{
    public function testAcessoAoClient()
    {
        $this->assertInstanceOf('/Gpupo/SteloSdk/Client/Client', $this->factoryClient());
    }
}
