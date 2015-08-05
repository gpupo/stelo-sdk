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

use Gpupo\SteloSdk\Auth\Manager;
use Gpupo\Tests\SteloSdk\TestCaseAbstract;

class ManagerTest extends TestCaseAbstract
{
    protected function getAuth()
    {
        return $this->getFactory()->factoryManager('auth');
    }

    public function testForneceTokenUtilizadoParaProteçãoContraCsrf()
    {
        $this->assertEquals(12, strlen($this->getAuth()->getCsrfToken()));
    }

    public function testInformaAUrlParaOndeOClienteSeráDirecionado()
    {
        $this->assertEquals('foo', $this->getAuth()->getAuthorizeUrl())  ;
    }
}
