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

namespace Gpupo\Tests\SteloSdk\Order;

use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\SteloSdk\Order\Order;
use Gpupo\Tests\SteloSdk\EntityTestCaseAbstract;

class OrderTest extends EntityTestCaseAbstract
{
    const QUALIFIED = '\Gpupo\SteloSdk\Order\Order';

    public static function setUpBeforeClass()
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();
    }

    public function dataProviderObject()
    {
        $expected = [
            'id'               => '1',
            'transactionType'  => 'hello',
            'shippingBehavior' => 'world',
            'country'          => 'BR',
            'cart'             => [],
            'payment'          => [],
            'customer'         => [],
            'changeShipment'   => false,
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }

    /**
     * @depends testPossuiSchema
     */
    public function testCadaPedidoPossuiId(Order $order)
    {
        $this->assertSame(111, $order->getId());
    }

    /**
     * @depends testPossuiSchema
     */
    public function testCadaPedidoPossuiObjetoCliente(Order $order)
    {
        $this->assertInstanceOf('\Gpupo\SteloSdk\Order\Customer', $order->getCustomer());
    }

    /**
     * @depends testPossuiSchema
     */
    public function testCadaPedidoPossuiObjetoBilling(Order $order)
    {
        $this->assertInstanceOf('\Gpupo\SteloSdk\Customer\BillingAddress', $order->getCustomer()->getBillingAddress());
    }

    /**
     * @depends testPossuiSchema
     */
    public function testCadaPedidoPossuiObjetoContendoEnderecoDeEntrega(Order $order)
    {
        $this->assertInstanceOf('\Gpupo\SteloSdk\Customer\ShippingAddress', $order->getCustomer()->getShippingAddress());
    }

    /**
     * @depends testPossuiSchema
     */
    public function testCadaPedidoPossuiColecaoDeProdutos(Order $order)
    {
        $collection = $order->getCart();

        $this->assertInstanceOf('\Gpupo\SteloSdk\Order\Cart\Cart', $collection);

        foreach ($collection as $product) {
            $this->assertInstanceOf('\Gpupo\SteloSdk\Order\Cart\Item', $product);
        }
    }

    /**
     * @depends testPossuiSchema
     */
    public function testProduzJsonEmFormatoEsperadoPelaApiDeDestino(Order $order)
    {
        $expected = $this->getResourceJson('fixtures/transaction.post.json');

        $array = $order->toArray();
        foreach (['order', 'payment', 'customer'] as $key) {
            $this->assertSame($expected[$key.'Data'], $array[$key.'Data'], '#'.ucfirst($key));
        }
    }

    /**
     * @testdox Possui método getId() para acessar Id
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterId(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('id', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método setId() que define Id
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterId(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('id', 'string', $object);
    }

    /**
     * @testdox Possui método getTransactionType() para acessar TransactionType
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterTransactionType(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('transactionType', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método setTransactionType() que define TransactionType
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterTransactionType(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('transactionType', 'string', $object);
    }

    /**
     * @testdox Possui método getShippingBehavior() para acessar ShippingBehavior
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterShippingBehavior(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('shippingBehavior', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método setShippingBehavior() que define ShippingBehavior
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterShippingBehavior(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('shippingBehavior', 'string', $object);
    }

    /**
     * @testdox Possui método getCountry() para acessar Country
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterCountry(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('country', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método setCountry() que define Country
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterCountry(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('country', 'string', $object);
    }

    /**
     * @testdox Possui método getCart() para acessar Cart
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterCart(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('cart', 'object', $object, $expected);
    }

    /**
     * @testdox Possui método setCart() que define Cart
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterCart(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('cart', 'object', $object);
    }

    /**
     * @testdox Possui método getPayment() para acessar Payment
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterPayment(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('payment', 'object', $object, $expected);
    }

    /**
     * @testdox Possui método setPayment() que define Payment
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterPayment(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('payment', 'object', $object);
    }

    /**
     * @testdox Possui método getCustomer() para acessar Customer
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterCustomer(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('customer', 'object', $object, $expected);
    }

    /**
     * @testdox Possui método setCustomer() que define Customer
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterCustomer(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('customer', 'object', $object);
    }

    /**
     * @testdox Possui método getChangeShipment() para acessar ChangeShipment
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterChangeShipment(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('changeShipment', 'boolean', $object, $expected);
    }

    /**
     * @testdox Possui método setChangeShipment() que define ChangeShipment
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterChangeShipment(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('changeShipment', 'boolean', $object);
    }
}
