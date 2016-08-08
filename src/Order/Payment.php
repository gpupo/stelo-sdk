<?php

/*
 * This file is part of gpupo/stelo-sdk
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <http://www.g1mr.com/>.
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
