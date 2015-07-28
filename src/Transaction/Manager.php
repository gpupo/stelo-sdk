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

use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\CommonSdk\Entity\ManagerAbstract;
use Gpupo\SteloSdk\Order\Order;
use Gpupo\CommonSdk\Response;

class Manager extends ManagerAbstract
{
    //protected $entity = 'Transaction';

    protected $maps = [
        'createFromOrder'   => ['POST', '/wallet/transactions'],
        'findById'          => ['GET', '/orders/transactions/{itemId}'],
    ];

    public function createFromOrder(Order $order)
    {
        $response = $this->execute($this->factoryMap('createFromOrder',
            ['itemId' => $order->getId()], $order->toJson()));

        if ($response->getHttpStatusCode() === 200) {
            return $this->factoryFromResponse($response);
        }
    }

    protected function factoryFromResponse(Response $response)
    {
        $dataRaw = $response->getData();
        $linkList = [];

        foreach($dataRaw->getLink() as $link) {
            $linkList[$link['@rel']] = $link['@href'];
        }

        $data = [
            'id'            => current($dataRaw->getOrderData()),
            'checkoutUrl'   => $linkList['urlWallet'],
        ];

        return new Transaction($data);
    }

    public function update(EntityInterface $entity, EntityInterface $existent)
    {
    }
}
