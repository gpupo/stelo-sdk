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

namespace Gpupo\SteloSdk\Customer;

/**
 *
 * @method string getAlias()    Acesso a alias
 * @method setAlias(string $alias)    Define alias
 * @method string getStreet()    Acesso a street
 * @method setStreet(string $street)    Define street
 * @method string getNumber()    Acesso a number
 * @method setNumber(string $number)    Define number
 * @method string getComplement()    Acesso a complement
 * @method setComplement(string $complement)    Define complement
 * @method string getNeighborhood()    Acesso a neighborhood
 * @method setNeighborhood(string $neighborhood)    Define neighborhood
 * @method string getZipCode()    Acesso a zipCode
 * @method setZipCode(string $zipCode)    Define zipCode
 * @method string getCity()    Acesso a city
 * @method setCity(string $city)    Define city
 * @method string getState()    Acesso a state
 * @method setState(string $state)    Define state
 * @method string getCountry()    Acesso a country
 * @method setCountry(string $country)    Define country
 *
 */
class Address extends AbstractAddress
{
    public function getSchema()
    {
        return array_merge(['alias' => 'string'], parent::getSchema());
    }
}
