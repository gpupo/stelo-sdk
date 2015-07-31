---

## Gpupo\SteloSdk\Order\Cart\Cart

* Parent class: Gpupo\CommonSdk\Entity\CollectionAbstract

### Methods

#### factoryElement

    mixed Gpupo\SteloSdk\Order\Cart\Cart::factoryElement($data)

* Visibility: **public**

##### Arguments
* $data **mixed**

---

## Gpupo\SteloSdk\Order\Customer\ShippingAddress

* Parent class: [Gpupo\SteloSdk\Order\Customer\BillingAddress](#gpupostelosdkordercustomerbillingaddress)

### Methods

#### getSchema

    mixed Gpupo\SteloSdk\Order\Customer\BillingAddress::getSchema()

* Visibility: **public**
* This method is defined by [Gpupo\SteloSdk\Order\Customer\BillingAddress](#gpupostelosdkordercustomerbillingaddress)

---

## Gpupo\SteloSdk\Order\Order

* Parent class: Gpupo\CommonSdk\Entity\EntityAbstract
* This class implements: Gpupo\CommonSdk\Entity\EntityInterface

### Methods

#### getSchema

    mixed Gpupo\SteloSdk\Order\Order::getSchema()

* Visibility: **public**

#### toArray

    mixed Gpupo\SteloSdk\Order\Order::toArray()

* Visibility: **public**

#### getId

     Gpupo\SteloSdk\Order\Order::getId()

* Visibility: **public**

#### setId

     Gpupo\SteloSdk\Order\Order::setId()

* Visibility: **public**

#### getTransactionType

     Gpupo\SteloSdk\Order\Order::getTransactionType()

* Visibility: **public**

#### setTransactionType

     Gpupo\SteloSdk\Order\Order::setTransactionType()

* Visibility: **public**

#### getShippingBehavior

     Gpupo\SteloSdk\Order\Order::getShippingBehavior()

* Visibility: **public**

#### setShippingBehavior

     Gpupo\SteloSdk\Order\Order::setShippingBehavior()

* Visibility: **public**

#### getCountry

     Gpupo\SteloSdk\Order\Order::getCountry()

* Visibility: **public**

#### setCountry

     Gpupo\SteloSdk\Order\Order::setCountry()

* Visibility: **public**

#### getCart

     Gpupo\SteloSdk\Order\Order::getCart()

* Visibility: **public**

#### setCart

     Gpupo\SteloSdk\Order\Order::setCart()

* Visibility: **public**

#### getPayment

     Gpupo\SteloSdk\Order\Order::getPayment()

* Visibility: **public**

#### setPayment

     Gpupo\SteloSdk\Order\Order::setPayment()

* Visibility: **public**

#### getCustomer

     Gpupo\SteloSdk\Order\Order::getCustomer()

* Visibility: **public**

#### setCustomer

     Gpupo\SteloSdk\Order\Order::setCustomer()

* Visibility: **public**

#### getChangeShipment

     Gpupo\SteloSdk\Order\Order::getChangeShipment()

* Visibility: **public**

#### setChangeShipment

     Gpupo\SteloSdk\Order\Order::setChangeShipment()

* Visibility: **public**

---

## Gpupo\SteloSdk\Transaction\Transaction

* Parent class: Gpupo\CommonSdk\Entity\EntityAbstract
* This class implements: Gpupo\CommonSdk\Entity\EntityInterface

### Methods

#### getSchema

    mixed Gpupo\SteloSdk\Transaction\Transaction::getSchema()

* Visibility: **public**

#### getId

     Gpupo\SteloSdk\Transaction\Transaction::getId()

* Visibility: **public**

#### setId

     Gpupo\SteloSdk\Transaction\Transaction::setId()

* Visibility: **public**

#### getStatusCode

     Gpupo\SteloSdk\Transaction\Transaction::getStatusCode()

* Visibility: **public**

#### setStatusCode

     Gpupo\SteloSdk\Transaction\Transaction::setStatusCode()

* Visibility: **public**

#### getStatusMessage

     Gpupo\SteloSdk\Transaction\Transaction::getStatusMessage()

* Visibility: **public**

#### setStatusMessage

     Gpupo\SteloSdk\Transaction\Transaction::setStatusMessage()

* Visibility: **public**

#### getFreight

     Gpupo\SteloSdk\Transaction\Transaction::getFreight()

* Visibility: **public**

#### setFreight

     Gpupo\SteloSdk\Transaction\Transaction::setFreight()

* Visibility: **public**

#### getAmount

     Gpupo\SteloSdk\Transaction\Transaction::getAmount()

* Visibility: **public**

#### setAmount

     Gpupo\SteloSdk\Transaction\Transaction::setAmount()

* Visibility: **public**

---

## Gpupo\SteloSdk\Order\Customer\Phone\Item

* Parent class: Gpupo\CommonSdk\Entity\EntityAbstract
* This class implements: Gpupo\CommonSdk\Entity\EntityInterface

### Methods

#### getSchema

    mixed Gpupo\SteloSdk\Order\Customer\Phone\Item::getSchema()

* Visibility: **public**

---

## Gpupo\SteloSdk\Order\Payment

* Parent class: Gpupo\CommonSdk\Entity\EntityAbstract
* This class implements: Gpupo\CommonSdk\Entity\EntityInterface

### Methods

#### getSchema

    mixed Gpupo\SteloSdk\Order\Payment::getSchema()

* Visibility: **public**

---

## Gpupo\SteloSdk\Order\Cart\Item

* Parent class: Gpupo\CommonSdk\Entity\EntityAbstract
* This class implements: Gpupo\CommonSdk\Entity\EntityInterface

### Methods

#### getSchema

    mixed Gpupo\SteloSdk\Order\Cart\Item::getSchema()

* Visibility: **public**

---

## Gpupo\SteloSdk\Transaction\Manager

* Parent class: Gpupo\CommonSdk\Entity\ManagerAbstract

Properties
----------

#### $maps

    protected mixed $maps = array('createFromOrder' => array('POST', '/wallet/transactions'), 'findById' => array('GET', '/orders/transactions/{itemId}'), 'delete' => array('DELETE', '/orders/transactions/{itemId}'))

* Visibility: **protected**

### Methods

#### createFromOrder

    mixed Gpupo\SteloSdk\Transaction\Manager::createFromOrder(\Gpupo\SteloSdk\Order\Order $order)

* Visibility: **public**

##### Arguments
* $order **[Gpupo\SteloSdk\Order\Order](#gpupostelosdkorderorder)**

#### deleteById

    mixed Gpupo\SteloSdk\Transaction\Manager::deleteById($itemId)

* Visibility: **public**

##### Arguments
* $itemId **mixed**

#### findById

    mixed Gpupo\SteloSdk\Transaction\Manager::findById($itemId)

* Visibility: **public**

##### Arguments
* $itemId **mixed**

#### factoryFromStatusResponse

    mixed Gpupo\SteloSdk\Transaction\Manager::factoryFromStatusResponse(\Gpupo\Common\Entity\Collection $response)

* Visibility: **protected**

##### Arguments
* $response **Gpupo\Common\Entity\Collection**

#### factoryFromCreateResponse

    mixed Gpupo\SteloSdk\Transaction\Manager::factoryFromCreateResponse(\Gpupo\CommonSdk\Response $response)

* Visibility: **protected**

##### Arguments
* $response **Gpupo\CommonSdk\Response**

#### update

    mixed Gpupo\SteloSdk\Transaction\Manager::update(\Gpupo\CommonSdk\Entity\EntityInterface $entity, \Gpupo\CommonSdk\Entity\EntityInterface $existent)

* Visibility: **public**

##### Arguments
* $entity **Gpupo\CommonSdk\Entity\EntityInterface**
* $existent **Gpupo\CommonSdk\Entity\EntityInterface**

---

## Gpupo\SteloSdk\Client\Client

* Parent class: Gpupo\CommonSdk\Client\ClientAbstract
* This class implements: Gpupo\CommonSdk\Client\ClientInterface

### Methods

#### getDefaultOptions

    mixed Gpupo\SteloSdk\Client\Client::getDefaultOptions()

* Visibility: **public**

#### renderAuthorization

    mixed Gpupo\SteloSdk\Client\Client::renderAuthorization()

* Visibility: **protected**

---

## Gpupo\SteloSdk\Order\Customer\Customer

* Parent class: Gpupo\CommonSdk\Entity\EntityAbstract
* This class implements: Gpupo\CommonSdk\Entity\EntityInterface

### Methods

#### getSchema

    mixed Gpupo\SteloSdk\Order\Customer\Customer::getSchema()

* Visibility: **public**

---

## Gpupo\SteloSdk\Order\Customer\BillingAddress

* Parent class: Gpupo\CommonSdk\Entity\EntityAbstract
* This class implements: Gpupo\CommonSdk\Entity\EntityInterface

### Methods

#### getSchema

    mixed Gpupo\SteloSdk\Order\Customer\BillingAddress::getSchema()

* Visibility: **public**

---

## Gpupo\SteloSdk\View\Lightbox

* Parent class: Gpupo\CommonSdk\Entity\EntityAbstract
* This class implements: Gpupo\CommonSdk\Entity\EntityInterface

### Methods

#### getSchema

    mixed Gpupo\SteloSdk\View\Lightbox::getSchema()

* Visibility: **public**

#### __construct

    mixed Gpupo\SteloSdk\View\Lightbox::__construct($checkoutUrl)

* Visibility: **public**

##### Arguments
* $checkoutUrl **mixed**

#### __toString

    mixed Gpupo\SteloSdk\View\Lightbox::__toString()

* Visibility: **public**

#### getCheckoutUrl

     Gpupo\SteloSdk\View\Lightbox::getCheckoutUrl()

* Visibility: **public**

#### setCheckoutUrl

     Gpupo\SteloSdk\View\Lightbox::setCheckoutUrl()

* Visibility: **public**

---

## Gpupo\SteloSdk\Factory

* Parent class: Gpupo\CommonSdk\FactoryAbstract

### Methods

#### setClient

    mixed Gpupo\SteloSdk\Factory::setClient(array $clientOptions)

* Visibility: **public**

##### Arguments
* $clientOptions **array**

#### getNamespace

    mixed Gpupo\SteloSdk\Factory::getNamespace()

* Visibility: **public**

#### getSchema

    mixed Gpupo\SteloSdk\Factory::getSchema($namespace)

* Visibility: **protected**

##### Arguments
* $namespace **mixed**

---

## Gpupo\SteloSdk\Order\Customer\Phone\Phone

* Parent class: Gpupo\CommonSdk\Entity\CollectionAbstract

### Methods

#### factoryElement

    mixed Gpupo\SteloSdk\Order\Customer\Phone\Phone::factoryElement($data)

* Visibility: **public**

##### Arguments
* $data **mixed**

