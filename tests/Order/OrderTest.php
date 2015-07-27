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

namespace Gpupo\Tests\SteloSdk\Order;

use Gpupo\SteloSdk\Order\Order;

use Gpupo\Tests\SteloSdk\TestCaseAbstract;

class OrderTest extends TestCaseAbstract
{
    public static function setUpBeforeClass()
    {
        self::displayClassDocumentation(new Order());
    }

    protected function factory()
    {
        $data = $this->getResourceJson('fixtures/order.input.json');

        return $this->getFactory()->createOrder($data);
    }

    public function testPossuiSchema()
    {
        $order = $this->factory();
        $this->assertInstanceOf('\Gpupo\SteloSdk\Order\Order', $order);

        return $order;
    }

    /**
     * @depends testPossuiSchema
     */
    public function testCadaPedidoPossuiObjetoCliente(Order $order)
    {
        $this->assertInstanceOf('\Gpupo\SteloSdk\Order\Customer\Customer', $order->getCustomer());
    }

    /**
     * @depends testPossuiSchema
     */
    public function testCadaPedidoPossuiObjetoBilling(Order $order)
    {
        $this->assertInstanceOf('\Gpupo\SteloSdk\Order\Customer\BillingAddress', $order->getCustomer()->getBillingAddress());
    }

    /**
     * @depends testPossuiSchema
     */
    public function testCadaPedidoPossuiObjetoContendoEnderecoDeEntrega(Order $order)
    {
        $this->assertInstanceOf('\Gpupo\SteloSdk\Order\Customer\ShippingAddress', $order->getCustomer()->getShippingAddress());

    }

    /**
     * @depends testPossuiSchema
     */
    public function testCadaPedidoPossuiColecaoDeProdutos(Order $order)
    {
        return $this->markTestIncomplete();
        $collection = $order->getCart();

        $this->assertInstanceOf('\Gpupo\SteloSdk\Order\Cart\Cart', $collection);

        foreach ($collection as $product) {
            $this->assertInstanceOf('\Gpupo\SteloSdk\Order\Cart\Item', $product);
        }
    }
}
