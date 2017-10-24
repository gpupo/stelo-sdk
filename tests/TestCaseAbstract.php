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

namespace Gpupo\Tests\SteloSdk;

use Gpupo\SteloSdk\Factory;
use Gpupo\Tests\CommonSdk\TestCaseAbstract as CommonSdkTestCaseAbstract;

abstract class TestCaseAbstract extends CommonSdkTestCaseAbstract
{
    private $factory;

    public static function getResourcesPath()
    {
        return dirname(dirname(__FILE__)).'/Resources/';
    }

    public function factoryClient()
    {
        return $this->getFactory()->getClient();
    }

    protected function factoryOrder()
    {
        $data = $this->getResourceJson('fixtures/order.input.json');

        return $this->getFactory()->createOrder($data);
    }

    protected function getOptions()
    {
        return [
            'client_id'     => $this->getConstant('CLIENT_ID'),
            'client_secret' => $this->getConstant('CLIENT_SECRET'),
            'client_secret' => $this->getConstant('CLIENT_SECRET'),
            'redirect_url'  => 'http://localhost/notify',
            'verbose'       => $this->getConstant('VERBOSE'),
            'dryrun'        => $this->getConstant('DRYRUN'),
            'registerPath'  => $this->getConstant('REGISTER_PATH'),
        ];
    }

    protected function getFactory()
    {
        if (!$this->factory) {
            $this->factory = Factory::getInstance()->setup($this->getOptions(), $this->getLogger());
        }

        return $this->factory;
    }

    protected function hasToken()
    {
        return $this->hasConstant('ACCESS_TOKEN');
    }
}
