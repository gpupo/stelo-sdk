<?php

/*
 * This file is part of gpupo/stelo-sdk
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <http://www.g1mr.com/>.
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
        $this->assertSame(9, strlen($this->getAuth()->getCsrfToken()));
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
        $this->assertSame('foo', $token->get('access_token'));
        $this->assertSame('foo', $token->getAccessToken(), 'Magic method');
        $this->assertSame('bar', $token->get('state'));

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

        $this->assertSame('Vanilla Ice', $customer->getCustomerName());
    }
}
