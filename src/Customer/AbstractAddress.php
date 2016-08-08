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

namespace Gpupo\SteloSdk\Customer;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

abstract class AbstractAddress extends EntityAbstract implements EntityInterface
{
    public function getSchema()
    {
        return [
            'street'       => 'string',
            'number'       => 'string',
            'complement'   => 'string',
            'neighborhood' => 'string',
            'zipCode'      => 'string',
            'city'         => 'string',
            'state'        => 'string',
            'country'      => 'string',
        ];
    }
}
