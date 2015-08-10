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

# Uso

## Setup Inicial

```PHP

//...
use Gpupo\SteloSdk\Factory;

$steloSdk = Factory::getInstance()->setup([
    'client_id'     => 'foo',
    'client_secret' => 'bar',
    'version'       => 'sandbox',
    'login_version' => 'login',
    'redirect_url'  => 'http://localhost/notify',
]);

```

Parâmetro | Descrição | Valores possíveis
----------|-----------|------------------
``client_id``|Chave da loja| string
``client_secret``|Token de autorização da aplicação| string
``version``|Identificação do Ambiente| sandbox, carteira.html (produção)
``redirect_url``|Controller para notificação de Login| Url própria
``login_version``|Ambiente de Login|login, login.html (produção)


## Transações

Nos exemplos abaixo considere que ``$data`` possui [esta estrutura](https://github.com/gpupo/stelo-sdk/blob/master/Resources/fixtures/order.input.json);

#### Criação de uma nova transação

``` PHP
$order = $steloSdk->createOrder($data);
$manager = $steloSdk->factoryManager('transaction');
$transaction = $manager->createFromOrder($order);

$checkoutUrl = $transaction->getCheckoutUrl();
echo $transaction->getId(); //143800246128360
```

#### Redireciona Cliente para a Url de checkout

``` HTML
<html>
    <body>
        <?php echo $steloSdk->createLightbox($checkoutUrl); ?>
    </body>
</html>
```

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

## Login com Stelo

A integração com o Login Stelo tem o objetivo de reduzir os passos para o checkout com foco no cadastro do cliente, com ela é possível recuperar os dados do cliente na Stelo e utilizar em sua loja

#### Url para redirecionar o Cliente (passo 1)

    $auth = $steloSdk->factoryManager('auth');

Token utilizado para proteção contra CSRF o qual deve ser adicionado à Session do Cliente e comparado na avaliação do Retorno da autenticação:

    $csrfToken = $auth->getCsrfToken();

Url Para Redirecionamento:

    $url = $auth->getAuthorizeUrl();

Exemplo de Url:

    https://login.html.stelo.com.br/sso/auth/v1/autorize?client_id=foo&response_type=code&state=889fa52ff915&scope=user_profile.all&redirect_url=https://www.example.com/notify

### Obtenção de ``$code`` (passo 2)

``$code`` é obtido no passo 2 que deve ser implementado independente da SDK, onde se recebe
o parâmetro GET ``code`` no controlador informado da loja (parâmetro ``redirect_url`` informado no Setup Inicial);

Deve ser comparado o CSRF Token da Session do Cliente com o parâmetro GET ``state``

Exemplo de Url:

    https://www.example.com/notify?code=xxxxxxxxxxxx&state=889fa52ff915

#### Uso do code para acesso ao token (passo 3)

    $access_token = $steloSdk->factoryManager('auth')->requestToken($code);

#### Acesso aos dados do cliente (passo 4)

    $customer = $steloSdk->factoryManager('auth')->requestCustomer($access_token);


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

A lista abaixo é gerada automaticamente a partir da saída da execução dos testes unitários:

<!--
phpunit --testdox | grep -vi php |  sed "s/.*\[*]/-/" | sed 's/.*Gpupo.*/&\'$'\n/g' | sed 's/.*Gpupo.*/&\'$'\n/g' | sed 's/Gpupo\\Tests\\SteloSdk\\/### /g' | sed '/./,/^$/!d' >> README.md
-->
### Auth\Customer

- Possui método getCustomerName() para acessar CustomerName
- Possui método setCustomerName() que define CustomerName
- Possui método getCustomerEmail() para acessar CustomerEmail
- Possui método setCustomerEmail() que define CustomerEmail
- Possui método getBirthDate() para acessar BirthDate
- Possui método setBirthDate() que define BirthDate
- Possui método getGender() para acessar Gender
- Possui método setGender() que define Gender
- Possui método getPhone() para acessar Phone
- Possui método setPhone() que define Phone
- Possui método getCpf() para acessar Cpf
- Possui método setCpf() que define Cpf
- Possui método getRg() para acessar Rg
- Possui método setRg() que define Rg
- Possui método getAddress() para acessar Address
- Possui método setAddress() que define Address
- Entidade é uma Coleção

### Auth\Manager

- Fornece token utilizado para proteção contra csrf
- Informa a url para onde o cliente será direcionado
- Acesso ao objeto token
- Acesso ao objeto customer

### Auth\Token

- Possui método getAccessToken() para acessar AccessToken
- Possui método setAccessToken() que define AccessToken
- Possui método getTokenType() para acessar TokenType
- Possui método setTokenType() que define TokenType
- Possui método getExpiresIn() para acessar ExpiresIn
- Possui método setExpiresIn() que define ExpiresIn
- Possui método getScope() para acessar Scope
- Possui método setScope() que define Scope
- Possui método getState() para acessar State
- Possui método setState() que define State
- Entidade é uma Coleção

### Client\Client

- Acesso ao client
- Sucesso ao definir options
- Gerencia uri de recurso

### Customer\Address

- Possui método ``getAlias()`` para acessar Alias
- Possui método ``setAlias()`` que define Alias
- Possui método ``getStreet()`` para acessar Street
- Possui método ``setStreet()`` que define Street
- Possui método ``getNumber()`` para acessar Number
- Possui método ``setNumber()`` que define Number
- Possui método ``getComplement()`` para acessar Complement
- Possui método ``setComplement()`` que define Complement
- Possui método ``getNeighborhood()`` para acessar Neighborhood
- Possui método ``setNeighborhood()`` que define Neighborhood
- Possui método ``getZipCode()`` para acessar ZipCode
- Possui método ``setZipCode()`` que define ZipCode
- Possui método ``getCity()`` para acessar City
- Possui método ``setCity()`` que define City
- Possui método ``getState()`` para acessar State
- Possui método ``setState()`` que define State
- Possui método ``getCountry()`` para acessar Country
- Possui método ``setCountry()`` que define Country
- Entidade é uma Coleção

### Customer\BillingAddress

- Possui método ``getAlias()`` para acessar Alias
- Possui método ``setAlias()`` que define Alias
- Possui método ``getStreet()`` para acessar Street
- Possui método ``setStreet()`` que define Street
- Possui método ``getNumber()`` para acessar Number
- Possui método ``setNumber()`` que define Number
- Possui método ``getComplement()`` para acessar Complement
- Possui método ``setComplement()`` que define Complement
- Possui método ``getNeighborhood()`` para acessar Neighborhood
- Possui método ``setNeighborhood()`` que define Neighborhood
- Possui método ``getZipCode()`` para acessar ZipCode
- Possui método ``setZipCode()`` que define ZipCode
- Possui método ``getCity()`` para acessar City
- Possui método ``setCity()`` que define City
- Possui método ``getState()`` para acessar State
- Possui método ``setState()`` que define State
- Possui método ``getCountry()`` para acessar Country
- Possui método ``setCountry()`` que define Country
- Entidade é uma Coleção

### Customer\Phone\Item

- Possui método getPhoneType() para acessar PhoneType
- Possui método setPhoneType() que define PhoneType
- Possui método getNumber() para acessar Number
- Possui método setNumber() que define Number
- Possui método getType() para acessar Type
- Possui método setType() que define Type
- Entidade é uma Coleção

### Customer\ShippingAddress

- Possui método ``getAlias()`` para acessar Alias
- Possui método ``setAlias()`` que define Alias
- Possui método ``getStreet()`` para acessar Street
- Possui método ``setStreet()`` que define Street
- Possui método ``getNumber()`` para acessar Number
- Possui método ``setNumber()`` que define Number
- Possui método ``getComplement()`` para acessar Complement
- Possui método ``setComplement()`` que define Complement
- Possui método ``getNeighborhood()`` para acessar Neighborhood
- Possui método ``setNeighborhood()`` que define Neighborhood
- Possui método ``getZipCode()`` para acessar ZipCode
- Possui método ``setZipCode()`` que define ZipCode
- Possui método ``getCity()`` para acessar City
- Possui método ``setCity()`` que define City
- Possui método ``getState()`` para acessar State
- Possui método ``setState()`` que define State
- Possui método ``getCountry()`` para acessar Country
- Possui método ``setCountry()`` que define Country
- Entidade é uma Coleção

### Factory

- Centraliza acesso a managers
- Centraliza criacao de objetos

### Order\Customer

- Possui método getCustomerName() para acessar CustomerName
- Possui método setCustomerName() que define CustomerName
- Possui método getCustomerEmail() para acessar CustomerEmail
- Possui método setCustomerEmail() que define CustomerEmail
- Possui método getBirthDate() para acessar BirthDate
- Possui método setBirthDate() que define BirthDate
- Possui método getGender() para acessar Gender
- Possui método setGender() que define Gender
- Possui método getPhone() para acessar Phone
- Possui método setPhone() que define Phone
- Possui método getCustomerIdentity() para acessar CustomerIdentity
- Possui método setCustomerIdentity() que define CustomerIdentity
- Possui método getBillingAddress() para acessar BillingAddress
- Possui método setBillingAddress() que define BillingAddress
- Possui método getShippingAddress() para acessar ShippingAddress
- Possui método setShippingAddress() que define ShippingAddress
- Entidade é uma Coleção

### Order\Order

- Possui método getId() para acessar Id
- Possui método setId() que define Id
- Possui método getTransactionType() para acessar TransactionType
- Possui método setTransactionType() que define TransactionType
- Possui método getShippingBehavior() para acessar ShippingBehavior
- Possui método setShippingBehavior() que define ShippingBehavior
- Possui método getCountry() para acessar Country
- Possui método setCountry() que define Country
- Possui método getCart() para acessar Cart
- Possui método setCart() que define Cart
- Possui método getPayment() para acessar Payment
- Possui método setPayment() que define Payment
- Possui método getCustomer() para acessar Customer
- Possui método setCustomer() que define Customer
- Possui método getChangeShipment() para acessar ChangeShipment
- Possui método setChangeShipment() que define ChangeShipment
- Entidade é uma Coleção

### Order\Payment

- Possui método getAmount() para acessar Amount
- Possui método setAmount() que define Amount
- Possui método getFreight() para acessar Freight
- Possui método setFreight() que define Freight
- Possui método getCurrency() para acessar Currency
- Possui método setCurrency() que define Currency
- Possui método getMaxInstallment() para acessar MaxInstallment
- Possui método setMaxInstallment() que define MaxInstallment
- Entidade é uma Coleção

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
- Possui método ``getId()`` para acessar Id
- Possui método ``setId()`` que define Id
- Possui método ``getStatusCode()`` para acessar StatusCode
- Possui método ``setStatusCode()`` que define StatusCode
- Possui método ``getStatusMessage()`` para acessar StatusMessage
- Possui método ``setStatusMessage()`` que define StatusMessage
- Possui método ``getFreight()`` para acessar Freight
- Possui método ``setFreight()`` que define Freight
- Possui método ``getAmount()`` para acessar Amount
- Possui método ``setAmount()`` que define Amount
- Possui método ``getCheckoutUrl()`` para acessar CheckoutUrl
- Possui método ``setCheckoutUrl()`` que define CheckoutUrl
- Entidade é uma Coleção

### View\Lightbox

- Possui url para redirecionamento do comprador
- Imprime javascript que redireciona o navegador do comprador
