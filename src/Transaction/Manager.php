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
use Gpupo\CommonSdk\Response;
use Gpupo\SteloSdk\Order\Order;
use Gpupo\Common\Entity\Collection;

class Manager extends ManagerAbstract
{
    protected $maps = [
        'createFromOrder'   => ['POST', '/wallet/transactions'],
        'findById'          => ['GET', '/orders/transactions/{itemId}'],
    ];

    public function createFromOrder(Order $order)
    {
        $response = $this->execute($this->factoryMap('createFromOrder',
            ['itemId' => $order->getId()], $order->toJson()));

        if ($response->getHttpStatusCode() === 200) {
            return $this->factoryFromCreateResponse($response);
        }
    }
    public function findById($itemId)
    {
        if ($collection = parent::findById($itemId)) {
            return $this->factoryFromStatusResponse($collection);
        }
    }

    protected function factoryFromStatusResponse(Collection $response)
    {
        $data = [
            'id'            => $response->getSteloId(),
            'statusCode'    => $response->getSteloStatus()['statusCode'],
            'statusMessage' => $response->getSteloStatus()['statusMessage'],
            'freight'       => $response->getFreight(),
            'amount'        => $response->getAmount(),
        ];

        return new Transaction($data);
    }

    protected function factoryFromCreateResponse(Response $response)
    {
        $dataRaw = $response->getData();
        $linkList = [];

        foreach ($dataRaw->getLink() as $link) {
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
