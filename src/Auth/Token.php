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

namespace Gpupo\SteloSdk\Auth;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

/**
 * @method float getExpires_in() Acesso a Expires_in
 * @method string getScope() Acesso a Scope
 * @method string getState() Acesso a State
 */
class Token extends EntityAbstract implements EntityInterface
{
    public function getSchema()
    {
        return [
            'access_token' => 'string',
            'token_type'   => 'string',
            'expires_in'   => 'number',
            'scope'        => 'string',
            'state'        => 'string',
        ];
    }

    public function getAccessToken()
    {
        return $this->get('access_token');
    }

    public function getTokenType()
    {
        return $this->get('token_type');
    }
}
