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

namespace Gpupo\SteloSdk\Auth;

use Gpupo\SteloSdk\ManagerAbstract;
use Gpupo\CommonSdk\Traits\PlaceholderTrait;
use Gpupo\Common\Interfaces\OptionsInterface;
use Gpupo\Common\Traits\OptionsTrait;

/**
 * Gerenciamento da autenticação do Cliente
 */
class Manager extends ManagerAbstract implements OptionsInterface
{
    use PlaceholderTrait;
    use OptionsTrait;

    protected $endpoint = 'https://login.html.stelo.com.br/sso/auth/v1';

    public function getDefaultOptions()
    {
        return  [
            'redirect_url'  => 'foo',
        ];
    }

    public function getAuthorizeUrl()
    {
        return $this->fillPlaceholdersWithArray($this->endpoint.'autorize?client_id={client_id}&redirect_url={redirect_url}', $this->getOptions()->toArray());
    }
}
