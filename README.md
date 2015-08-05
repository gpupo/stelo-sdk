[![Build Status](https://secure.travis-ci.org/gpupo/stelo-sdk.png?branch=master)](http://travis-ci.org/gpupo/stelo-sdk)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/gpupo/stelo-sdk/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/gpupo/stelo-sdk/?branch=master)
[![Code Climate](https://codeclimate.com/github/gpupo/stelo-sdk/badges/gpa.svg)](https://codeclimate.com/github/gpupo/stelo-sdk)
[![Test Coverage](https://codeclimate.com/github/gpupo/stelo-sdk/badges/coverage.svg)](https://codeclimate.com/github/gpupo/stelo-sdk/coverage)

# stelo-sdk

SDK Não Oficial para integração a partir de aplicações PHP com as APIs da Stelo.com.br

## Requisitos

* PHP >= *5.4*
* [curl extension](http://php.net/manual/en/intro.curl.php)

---

## Instalação

Adicione o pacote [stelo-sdk](https://packagist.org/packages/gpupo/stelo-sdk) ao seu projeto utilizando [composer](http://getcomposer.org):

    composer require gpupo/stelo-sdk

---

## Uso

### Transação

Nos exemplos abaixo considere que ``$data`` possui [esta estrutura](https://github.com/gpupo/stelo-sdk/blob/master/Resources/fixtures/order.input.json);

### Setup Inicial

    <?php
    //...
    use Gpupo\SteloSdk\Factory;

    $steloSdk = Factory::getInstance()->setup([
        'client_id'     => 'foo',
        'client_secret' => 'bar',
        'version'       => 'sandbox',
        'redirect_url'  => 'http://localhost/notify',
    ]);

#### Criação de uma nova transação

    $order = $steloSdk->createOrder($data);
    $manager = $steloSdk->factoryManager('transaction');
    $transaction = $manager->createFromOrder($order);

    $checkoutUrl = $transaction->getCheckoutUrl();
    echo $transaction->getId(); //143800246128360

#### Redireciona Cliente para a Url de checkout

    <html>
        <body>
            <?php echo $steloSdk->createLightbox($checkoutUrl); ?>
        </body>
    </html>

#### Consulta de transação

    $transaction = $steloSdk->factoryManager('transaction')
        ->findById('143800246128360');
    echo $transaction->getStatusCode(); // N
    echo $transaction->getStatusMessage(); // Cancelada
    echo $transaction->getAmount(); // 134.9


#### Cancelar uma  transação

    $transaction = $steloSdk->factoryManager('transaction')
        ->deleteById('143800246128360');

#### Registro (log)

    //...
    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;
    //..
    $logger = new Logger('foo');
    $logger->pushHandler(new StreamHandler('Resources/logs/main.log', Logger::DEBUG));
    $steloSdk->setLogger($logger);

### Login (Em desenvolvimento!!)

A integração com o Login Stelo tem o objetivo de reduzir os passos para o checkout com foco no cadastro do cliente, com ela é possível recuperar os dados do cliente na Stelo e utilizar em sua loja

#### Url para redirecionar o Cliente (passo 1)

    $auth = $steloSdk->factoryManager('auth');

Token utilizado para proteção contra CSRF o qual deve ser adicionado à Session do Cliente e comparado na avaliação do Retorno da autenticação:

    $csrfToken = $auth->getCsrfToken();

Url Para Redirecionamento:

    $url = $auth->getAuthorizeUrl();

Exemplo de Url:

``https://login.html.stelo.com.br/sso/auth/v1/autorize?client_id=foo&response_type=code&state=889fa52ff915&scope=user_profile.all&redirect_url=https://www.example.com/notify``

### Obtenção de ``$code`` (passo 2)

``$code`` é obtido no passo 2 que deve ser implementado independente da SDK, onde se recebe
o parâmetro GET ``code`` no controlador informado da loja (parâmetro ``redirect_url`` informado no Setup Inicial);

Deve ser comparado o CSRF Token da Session do Cliente com o parâmetro GET ``state``

Exemplo de Url:

``https://www.example.com/notify?code=xxxxxxxxxxxx&state=889fa52ff915``

#### Uso do code para acesso ao token (passo 3)

    $access_token = $steloSdk->factoryManager('auth')->requestToken($code);

#### Acesso aos dados do cliente (passo 4)

    $customer = $steloSdk->factoryManager('auth')->requestCustomer($access_token);
    echo $customer->getName();

Veja mais detalhes sobre as propriedades de ``$customer`` na documentação do objeto.


## Comandos

Lista de comandos disponíveis:

    ./bin/main

Verificar a situação de uma transação:

    ./bin/main transaction:find

ou ainda executar o mesmo comando de forma não interativa:

    ./bin/main transaction:find -c foo -t bar -s SecureTransport -p http -a sandbox  -i 8888133556


*Dica*: Verifique os logs gerados em ``Resources/logs/main.log``

---

## Licença

MIT, see [LICENSE](https://github.com/gpupo/stelo-sdk/blob/master/LICENSE).

---

## Desenvolvimento

#### Instalação:

    git clone --depth=1  git@github.com:gpupo/stelo-sdk.git

    cd stelo-sdk;

    ant composer;

#### Rode os testes localmente:

    $ phpunit


## Documentação

* [Documentação de integração para transações Stelo](https://github.com/gpupo/stelo-sdk/blob/master/Resources/doc/manual_stelo_api.pdf)
* [Documentação de integração para login Stelo](https://github.com/gpupo/stelo-sdk/blob/master/Resources/doc/manual-login-stelo.pdf)

### Fluxo de Login

![Fluxo de Login](http://www.g1mr.com/stelo-sdk/images/fluxo-login.png)

### Fluxo de Transação

![Fluxo de Transação](http://www.g1mr.com/stelo-sdk/images/fluxo-transaction.png)


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
- Cada pedido possui id
- Cada pedido possui objeto cliente
- Cada pedido possui objeto billing
- Cada pedido possui objeto contendo endereco de entrega
- Cada pedido possui colecao de produtos
- Produz json em formato esperado pela api de destino

### Transaction\Manager

- É usado para criar uma nova transação
- Permite consulta a uma transação específica
- Permite o cancelamento de uma transação específica
- Falha ao tentar cancelar uma transação inexistente ou em situação que não permita tal operação

### Transaction\Transaction

- Possui id
- Possui url de checkout
- Possui status code
- Possui identificação de situação atual
- Possui valor da transação
- Possui valor de frete

### View\Lightbox

- Possui url para redirecionamento do comprador
- Imprime javascript que redireciona o navegador do comprador
