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

namespace Gpupo\SteloSdk\Customer\Phone;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

class Item extends EntityAbstract implements EntityInterface
{
    public function getSchema()
    {
        return [
            'phoneType'        => 'string',
            'number'           => 'string',
            'type'             => 'number',
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
