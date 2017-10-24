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

namespace Gpupo\Tests\SteloSdk\View;

use Gpupo\SteloSdk\View\Lightbox;
use Gpupo\Tests\SteloSdk\TestCaseAbstract;

class LightboxTest extends TestCaseAbstract
{
    public static function setUpBeforeClass()
    {
        self::displayClassDocumentation(new Lightbox());
    }

    public function testPossuiUrlParaRedirecionamentoDoComprador()
    {
        $lightbox = new Lightbox('http://www.example.com');
        $this->assertInstanceOf('\Gpupo\SteloSdk\View\Lightbox', $lightbox);
        $this->assertSame('http://www.example.com', $lightbox->getCheckoutUrl());

        return $lightbox;
    }

    /**
     * @depends testPossuiUrlParaRedirecionamentoDoComprador
     */
    public function testImprimeJavascriptQueRedirecionaONavegadorDoComprador(Lightbox $lightbox)
    {
        $this->assertStringStartsWith('<!-- Stelo Lightbox --><script>', (string) $lightbox);
    }
}
