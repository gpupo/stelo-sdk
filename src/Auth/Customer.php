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

class Customer extends AbstractCustomer
{
    public function getSchema()
    {
        return array_merge(parent::getSchema(), [
            'cpf'      => 'string',
            'rg'       => 'string',
        ]);
    }
    public function __construct($data = null)
    {
        foreach($this->conversion() as $old => $new) {
            if (array_key_exists($old, $data)) {
                $data[$new] = $data[$old];
                unset($data[$old]);
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
