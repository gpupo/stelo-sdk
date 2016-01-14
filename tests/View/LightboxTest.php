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
