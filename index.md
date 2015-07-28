---
layout: default
---
[![Build Status](https://secure.travis-ci.org/gpupo/stelo-sdk.png?branch=master)](http://travis-ci.org/gpupo/stelo-sdk)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/gpupo/stelo-sdk/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/gpupo/stelo-sdk/?branch=master)


# stelo-sdk

SDK Não Oficial para integração a partir de aplicações PHP com as APIs da Stelo.com.br

---

## Instalação

Adicione o pacote [stelo-sdk](https://packagist.org/packages/gpupo/stelo-sdk) ao seu projeto utilizando [composer](http://getcomposer.org):

    composer require gpupo/stelo-sdk

---

### Uso


    <?php
    ///...
    use Gpupo\SteloSdk\Factory;

    $factory = Factory::getInstance()->setup(['clientId' => 'foo','clientSecret' => 'bar', 'version' => 'sandbox']);

    $order = $factory->createOrder($data);
    $transaction = $order->sent();

    $checkoutUrl = $transaction->getCheckoutUrl();
    $transaction->getId();

    $lightbox = $factory->createLightbox($checkoutUrl);
    echo $lightbox;

---

## Licença

MIT, see [LICENSE](https://github.com/gpupo/stelo-sdk/blob/master/LICENSE).

---

## Desenvolvimento

Instalação:

    git clone --depth=1  git@github.com:gpupo/stelo-sdk.git

    cd stelo-sdk;

    ant composer;

Personalize a configuração do ``phpunit``:

    cp phpunit.xml.dist phpunit.xml;

Insira sua Token de Sandbox em ``phpunit.xml``:

    <!-- Customize your parameters ! -->
    <php>
        <const name="VERBOSE" value="false"/>
    </php>

Rode os testes localmente:

    $ phpunit


* [Documentação dos objetos](http://www.g1mr.com/stelo-sdk/doc/)
* [Documentação oficial](https://github.com/gpupo/stelo-sdk/blob/master/Resources/doc/manual_stelo_api.pdf)

---

## Propriedades dos objetos

A lista abaixo é gerada a partir da saída da execução dos testes unitários:
<!--
phpunit --testdox | grep -vi php |  sed "s/.*\[*]/-/" | sed 's/.*Gpupo.*/&\'$'\n/g' | sed 's/.*Gpupo.*/&\'$'\n/g' | sed 's/Gpupo\\Tests\\SteloSdk\\/### /g' | sed '/./,/^$/!d' >> README.md
-->
### Client\Client

- Acesso ao client
- Sucesso ao definir options
- Gerencia uri de recurso

### Factory

- Centraliza acesso a managers
- Centraliza criacao de objetos

### Order\Order

- Possui schema
- Cada pedido possui objeto cliente
- Cada pedido possui objeto billing
- Cada pedido possui objeto contendo endereco de entrega
- Cada pedido possui colecao de produtos

