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
 * @method float getAmount()    Acesso a amount
 * @method setAmount(float $amount)    Define amount
 * @method float getFreight()    Acesso a freight
 * @method setFreight(float $freight)    Define freight
 * @method string getCurrency()    Acesso a currency
 * @method setCurrency(string $currency)    Define currency
 * @method string getMaxInstallment()    Acesso a maxInstallment
 * @method setMaxInstallment(string $maxInstallment)    Define maxInstallment
 */
class Payment extends EntityAbstract implements EntityInterface
{
    public function getSchema()
    {
        return [
            'amount'         => 'number',
            'freight'        => 'number',
            'currency'       => 'string',
            'maxInstallment' => 'string',
        ];
    }
}
