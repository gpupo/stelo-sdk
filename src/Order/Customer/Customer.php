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

namespace Gpupo\SteloSdk\Order\Customer;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

class Customer extends EntityAbstract implements EntityInterface
{
    public function getSchema()
    {
        return [
            'customerIdentity'  => 'string',
            'customerName'      => 'string',
            'customerEmail'     => 'string',
            'birthDay'          => 'string',
            'gender'            => 'string',
            'phone'             => 'object',
            'billingAddress'    => 'object',
            'shippingAddress'   => 'object',
        ];
    }
}