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

namespace Gpupo\Tests\SteloSdk\Client;

use Gpupo\Tests\SteloSdk\TestCaseAbstract;

class ClientTest extends TestCaseAbstract
{
    public function testAcessoAoClient()
    {
        $this->assertInstanceOf('\Gpupo\SteloSdk\Client\Client', $this->factoryClient());
    }

    public function testSucessoAoDefinirOptions()
    {
        $client = $this->factoryClient();
        $this->assertInstanceOf('\Gpupo\CommonSdk\Client\ClientInterface', $client);

        return $client;
    }

    /**
     * @depends testSucessoAoDefinirOptions
     */
    public function testGerenciaUriDeRecurso($client)
    {
        $this->assertSame(
            'http://sandbox.stelo.com.br/ec/V1/wallet/transactions',
            $client->getResourceUri('/wallet/transactions')
        );
    }
}
