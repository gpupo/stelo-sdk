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
            'client_id'         => $this->getConstant('CLIENT_ID'),
            'client_secret'     => $this->getConstant('CLIENT_SECRET'),
            'client_secret'     => $this->getConstant('CLIENT_SECRET'),
            'redirect_url'      => 'http://localhost/notify',
            'verbose'           => $this->getConstant('VERBOSE'),
            'dryrun'            => $this->getConstant('DRYRUN'),
            'registerPath'      => $this->getConstant('REGISTER_PATH'),
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
