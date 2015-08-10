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

use Gpupo\SteloSdk\Customer\AbstractCustomer;

/**
 * @method string getCustomerName()    Acesso a customerName
 * @method setCustomerName(string $customerName)    Define customerName
 * @method string getCustomerEmail()    Acesso a customerEmail
 * @method setCustomerEmail(string $customerEmail)    Define customerEmail
 * @method string getBirthDate()    Acesso a birthDate
 * @method setBirthDate(string $birthDate)    Define birthDate
 * @method string getGender()    Acesso a gender
 * @method setGender(string $gender)    Define gender
 * @method Gpupo\SteloSdk\Customer\Phone\Phone getPhone()    Acesso a phone
 * @method setPhone(Gpupo\SteloSdk\Customer\Phone\Phone $phone)    Define phone
 * @method string getCustomerIdentity()    Acesso a customerIdentity
 * @method setCustomerIdentity(string $customerIdentity)    Define customerIdentity
 * @method Gpupo\SteloSdk\Customer\BillingAddress getBillingAddress()    Acesso a billingAddress
 * @method setBillingAddress(Gpupo\SteloSdk\Customer\BillingAddress $billingAddress)    Define billingAddress
 * @method Gpupo\SteloSdk\Customer\ShippingAddress getShippingAddress()    Acesso a shippingAddress
 * @method setShippingAddress(Gpupo\SteloSdk\Customer\ShippingAddress $shippingAddress)    Define shippingAddress
 */
class Customer extends AbstractCustomer
{
    public function getSchema()
    {
        return array_merge(parent::getSchema(), [
            'customerIdentity'  => 'string',
            'billingAddress'    => 'object',
            'shippingAddress'   => 'object',
        ]);
    }
}
