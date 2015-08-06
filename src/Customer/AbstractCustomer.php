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

namespace Gpupo\SteloSdk\Customer;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

/**
 * Entidade Cliente
 *
 * @method setCustomerIdentity(string $customerIdentity) Define CustomerIdentity
 * @method string getCustomerIdentity() Acesso a CustomerIdentity
 * @method setCustomerName(string $customerName) Define CustomerName
 * @method string getCustomerName() Acesso a CustomerName
 * @method setCustomerEmail(string $customerEmail) Define CustomerEmail
 * @method string getCustomerEmail() Acesso a CustomerEmail
 * @method setBirthDay(string $birthDay) Define BirthDay
 * @method string getBirthDay() Acesso a BirthDay
 * @method setGender(string $gender) Define Gender
 * @method string getGender() Acesso a Gender
 * @method setPhone(Gpupo\SteloSdk\Customer\Phone\Phone $phone) Define Phone
 * @method Gpupo\SteloSdk\Customer\Phone\Phone getPhone() Acesso a Phone
 * @method setBillingAddress(Gpupo\SteloSdk\Customer\BillingAddress $billingAddress) Define BillingAddress
 * @method Gpupo\SteloSdk\Customer\BillingAddress getBillingAddress() Acesso a BillingAddress
 * @method setShippingAddress(Gpupo\SteloSdk\Customer\ShippingAddress $shippingAddress) Define ShippingAddress
 * @method Gpupo\SteloSdk\Customer\ShippingAddress getShippingAddress() Acesso a ShippingAddress
 */
abstract class AbstractCustomer extends EntityAbstract implements EntityInterface
{
    public $description = 'Entidade Cliente';

    public function getSchema()
    {
        return [
            'customerName'      => 'string',
            'customerEmail'     => 'string',
            'birthDate'         => 'string',
            'gender'            => 'string',
            'phone'             => 'object',
        ];
    }
}
