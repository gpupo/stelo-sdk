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

namespace Gpupo\SteloSdk\Order;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

/**
 * @method string getId()
 * @method setId(string $id)
 * @method string getTransactionType()
 * @method setTransactionType(string $transactionType)
 * @method string getShippingBehavior()
 * @method setShippingBehavior(string $shippingBehavior)
 * @method string getCountry()
 * @method setCountry(string $country)
 * @method Gpupo\SteloSdk\Order\Cart\Cart getCart()
 * @method setCart(Gpupo\SteloSdk\Order\Cart\Cart $cart)
 * @method Gpupo\SteloSdk\Order\Payment getPayment()
 * @method setPayment(Gpupo\SteloSdk\Order\Payment $payment)
 * @method Gpupo\SteloSdk\Order\Customer\Customer getCustomer()
 * @method setCustomer(Gpupo\SteloSdk\Order\Customer\Customer $customer)
 * @method bool getChangeShipment()
 * @method setChangeShipment(bool $changeShipment)
 */
class Order extends EntityAbstract implements EntityInterface
{
    public function getSchema()
    {
        return [
            'id'               => 'string',
            'transactionType'  => 'string',
            'shippingBehavior' => 'string',
            'country'          => 'string',
            'cart'             => 'object',
            'payment'          => 'object',
            'customer'         => 'object',
            'changeShipment'   => 'boolean',
        ];
    }

    public function toArray()
    {
        $customer = $this->getCustomer()->toArray();
        $customer['phoneData'] = $customer['phone'];
        unset($customer['phone']);

        return [
            'orderData' => [
                'orderId'          => $this->getId(),
                'transactionType'  => $this->getTransactionType(),
                'shippingBehavior' => $this->getShippingBehavior(),
                'changeShipment'   => $this->getChangeShipment(),
                'country'          => $this->getCountry(),
            ],
            'paymentData'  => array_merge($this->getPayment()->toArray(), ['cartData' => $this->getCart()->toArray()]),
            'customerData' => $customer,
        ];
    }
}
