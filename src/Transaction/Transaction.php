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

namespace Gpupo\SteloSdk\Transaction;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

/**
 * @method string getId()
 * @method setId(string $id)
 * @method string getStatusCode()
 * @method setStatusCode(string $statusCode)
 * @method string getStatusMessage()
 * @method setStatusMessage(string $statusMessage)
 * @method string getFreight()
 * @method setFreight(string $freight)
 * @method string getAmount()
 * @method setAmount(string $amount)
 */
class Transaction extends EntityAbstract implements EntityInterface
{
    public function getSchema()
    {
        return [
            'id'            => 'string',
            'statusCode'    => 'string',
            'statusMessage' => 'string',
            'freight'       => 'string',
            'amount'        => 'string',
            'checkoutUrl'   => 'string',
        ];
    }
}
