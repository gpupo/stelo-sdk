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

use Gpupo\SteloSdk\Auth\Token;
use Gpupo\Tests\SteloSdk\TestCaseAbstract;

class ManagerTest extends TestCaseAbstract
{
    protected function getAuth()
    {
        return $this->getFactory()->factoryManager('auth');
    }

    public function testForneceTokenUtilizadoParaProteçãoContraCsrf()
    {
        $this->assertEquals(9, strlen($this->getAuth()->getCsrfToken()));
    }

    public function testInformaAUrlParaOndeOClienteSeráDirecionado()
    {
        $this->assertStringStartsWith('https://login.stelo.com.br/sso/auth/v1/oauth2/authorize', $this->getAuth()->getAuthorizeUrl());
    }

    public function testAcessoAoObjetoToken()
    {
        $auth = $this->getAuth()->setDryRun($this->factoryResponseFromFixture('fixtures/token.json'));
        $token = $auth->requestToken('43452');
        $this->assertInstanceOf('Gpupo\SteloSdk\Auth\Token', $token);
        $this->assertEquals('foo', $token->get('access_token'));
        $this->assertEquals('foo', $token->getAccessToken(), 'Magic method');
        $this->assertEquals('bar', $token->get('state'));

        return $token;
    }

    /**
     * @depends testAcessoAoObjetoToken
     */
    public function testAcessoAoObjetoCustomer(Token $token)
    {
        $customer = $this->getAuth()
            ->setDryRun($this->factoryResponseFromFixture('fixtures/customer.json'))
            ->requestCustomer($token);

        $this->assertInstanceOf('Gpupo\SteloSdk\Auth\Customer', $customer);

        $this->assertEquals('Vanilla Ice', $customer->getCustomerName());
    }
}
