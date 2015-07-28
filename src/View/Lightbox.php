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

namespace Gpupo\SteloSdk\View;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

/**
 * @method string getCheckoutUrl()
 * @method setCheckoutUrl(string $checkoutUrl)
 */
class Lightbox extends EntityAbstract implements EntityInterface
{
    public function getSchema()
    {
        return [
            'checkoutUrl' => 'string',
        ];
    }

    public function __construct($checkoutUrl = '')
    {
        parent::__construct();

        $this->setCheckoutUrl($checkoutUrl);
    }

    public function __toString()
    {
        return '<!-- Stelo Lightbox --><script>LoadScript=function(src,callback){var s,r,t;var callback=(typeof(callback)==\'function\')?callback:function(){};r=false;s=document.createElement(\'script\');s.type=\'text/javascript\';s.src=src;s.async=true;s.onload=s.onreadystatechange=function(){if(!r&&(!this.readyState||this.readyState==\'complete\'||this.readyState==\'loaded\')){r=true;callback.call(this)}};try{t=document.getElementsByTagName(\'script\')[0];t.parent.insertBefore(s,t)}catch(e){t=document.getElementsByTagName(\'head\')[0];t.appendChild(s)}}LoadScript("https://carteira.stelo.com.br/static/js/stelo-lightbox/stelo-lightbox-min.js",function(){LightBoxStelo._chamaLightboxPorFuncao("'
            . $this->getCheckoutUrl().'",true)});</script>';
    }

}
