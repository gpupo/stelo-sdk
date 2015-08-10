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

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

/**
 * @method string getAccess_token() Acesso a Access_token
 * @method string getToken_type() Acesso a Token_type
 * @method float getExpires_in() Acesso a Expires_in
 * @method string getScope() Acesso a Scope
 * @method string getState() Acesso a State
 */
class Token extends EntityAbstract implements EntityInterface
{
    public function getSchema()
    {
        return [
            'access_token'  => 'string',
            'token_type'    => 'string',
            'expires_in'    => 'number',
            'scope'         => 'string',
            'state'         => 'string',
        ];
    }
}
