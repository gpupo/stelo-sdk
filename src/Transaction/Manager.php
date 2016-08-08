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

namespace Gpupo\SteloSdk\Transaction;

use Gpupo\Common\Entity\Collection;
use Gpupo\CommonSdk\Response;
use Gpupo\SteloSdk\ManagerAbstract;
use Gpupo\SteloSdk\Order\Order;

/**
 * Gerenciamento de Transações Stelo.
 */
class Manager extends ManagerAbstract
{
    protected $maps = [
        'createFromOrder' => ['POST', '/wallet/transactions'],
        'findById'        => ['GET', '/orders/transactions/{itemId}'],
        'delete'          => ['DELETE', '/orders/transactions/{itemId}'],
    ];

    protected function isSuccess(Response $response)
    {
        if ($response->getHttpStatusCode() === 200 || $response->getHttpStatusCode() === 202) {
            return true;
        }

        return false;
    }

    /**
     * Cria uma transação a partir de um objeto Order.
     *
     * @param Order $order Objeto Pedido
     *
     * @return Transaction Transação Stelo
     */
    public function createFromOrder(Order $order)
    {
        $response = $this->execute($this->factoryMap(
            'createFromOrder',
            ['itemId' => $order->getId()]
        ), $order->toJson());

        if ($this->isSuccess($response)) {
            return $this->factoryFromCreateResponse($response);
        }
    }

    public function deleteById($itemId)
    {
        $response = $this->execute($this->factoryMap('delete', ['itemId' => $itemId]));
        if ($this->isSuccess($response) && $response->getData()->containsKey('steloId')) {
            return true;
        }

        return false;
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
            'id'          => current($dataRaw->getOrderData()),
            'checkoutUrl' => $linkList['urlWallet'],
        ];

        return new Transaction($data);
    }
}
