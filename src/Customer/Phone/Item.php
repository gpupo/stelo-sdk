<?php

/*
 * This file is part of gpupo/stelo-sdk
 * Created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <https://opensource.gpupo.com/>.
 */

namespace Gpupo\SteloSdk\Customer\Phone;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

class Item extends EntityAbstract implements EntityInterface
{
    public function getSchema()
    {
        return [
            'phoneType' => 'string',
            'number'    => 'string',
            'type'      => 'number',
        ];
    }

    protected function beforeConstruct($data = null)
    {
        if (!empty($data) && !array_key_exists('phoneType', $data) && array_key_exists('type', $data)) {
            $table = [
                '0' => 'LANDLINE',
                '1' => 'LANDLINE',
                '2' => 'CELL',
            ];

            if (array_key_exists($data['type'], $table)) {
                $data['phoneType'] = $table[$data['type']];
            }
        }

        return $data;
    }

    public function toArray()
    {
        $list = parent::toArray();
        unset($list['type']);

        return $list;
    }
}
