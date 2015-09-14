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

namespace Gpupo\SteloSdk\Auth;

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
 * @method string getCpf()    Acesso a cpf
 * @method setCpf(string $cpf)    Define cpf
 * @method string getRg()    Acesso a rg
 * @method setRg(string $rg)    Define rg
 * @method Gpupo\SteloSdk\Customer\Address getAddress()    Acesso a address
 * @method setAddress(Gpupo\SteloSdk\Customer\Address $address)    Define address
 */
class Customer extends AbstractCustomer
{
    public function getSchema()
    {
        return array_merge(parent::getSchema(), [
            'cpf'      => 'string',
            'rg'       => 'string',
            'address'  => 'object',
        ]);
    }
    public function __construct($data = null)
    {
        if ($data) {
            if (! array_key_exists('phone', $data)) {
                $data = current($data);
            }
            foreach ($this->conversion() as $old => $new) {
                if (array_key_exists($old, $data)) {
                    $data[$new] = $data[$old];
                    unset($data[$old]);
                }
            }
        }

        parent::__construct($data);
    }

    protected function conversion()
    {
        return [
            'name'      => 'customerName',
            'email'     => 'customerEmail',
            'phones'    => 'phone',
        ];
    }
}
