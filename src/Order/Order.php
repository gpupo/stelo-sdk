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

namespace Gpupo\SteloSdk\Order;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

/**
 * Magic methods on Gpupo\SteloSdk\Order\Order:
 *
 * @method string getId()
 * @method setId(string $id)
 * @method string getTransactionType()
 * @method setTransactionType(string $transactionType)
 * @method string getShippingBehavior()
 * @method setShippingBehavior(string $shippingBehavior)
 * @method string getCountry()
 * @method setCountry(string $country)
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
            'id'                    => 'string',
            'transactionType'       => 'string',
            'shippingBehavior'      => 'string',
            'country'               => 'string',
            'payment'               => 'object',
            'customer'              => 'object',
            'changeShipment'        => 'bool',
        ];
    }
}
