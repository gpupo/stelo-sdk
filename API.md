---
 title: API
---

## Gpupo\SteloSdk\Order\Cart\Cart

* Parent class: Gpupo\CommonSdk\Entity\CollectionAbstract

#### Methods

*``public`` factoryElement($data)

##### Arguments
$data **mixed**
---

---

## Gpupo\SteloSdk\Order\Customer\ShippingAddress

* Parent class: [Gpupo\SteloSdk\Order\Customer\BillingAddress](#gpupostelosdkordercustomerbillingaddress)

#### Methods

*``public`` getSchema()

---

## Gpupo\SteloSdk\Order\Order

* Parent class: Gpupo\CommonSdk\Entity\EntityAbstract
* This class implements: Gpupo\CommonSdk\Entity\EntityInterface

#### Methods

*``public`` getSchema()

*``public`` toArray()

*``public`` getId()

*``public`` setId()

*``public`` getTransactionType()

*``public`` setTransactionType()

*``public`` getShippingBehavior()

*``public`` setShippingBehavior()

*``public`` getCountry()

*``public`` setCountry()

*``public`` getCart()

*``public`` setCart()

*``public`` getPayment()

*``public`` setPayment()

*``public`` getCustomer()

*``public`` setCustomer()

*``public`` getChangeShipment()

*``public`` setChangeShipment()

---

## Gpupo\SteloSdk\Transaction\Transaction

* Parent class: Gpupo\CommonSdk\Entity\EntityAbstract
* This class implements: Gpupo\CommonSdk\Entity\EntityInterface

#### Methods

*``public`` getSchema()

*``public`` getId()

*``public`` setId()

*``public`` getStatusCode()

*``public`` setStatusCode()

*``public`` getStatusMessage()

*``public`` setStatusMessage()

*``public`` getFreight()

*``public`` setFreight()

*``public`` getAmount()

*``public`` setAmount()

---

## Gpupo\SteloSdk\Order\Customer\Phone\Item

* Parent class: Gpupo\CommonSdk\Entity\EntityAbstract
* This class implements: Gpupo\CommonSdk\Entity\EntityInterface

#### Methods

*``public`` getSchema()

---

## Gpupo\SteloSdk\Order\Payment

* Parent class: Gpupo\CommonSdk\Entity\EntityAbstract
* This class implements: Gpupo\CommonSdk\Entity\EntityInterface

#### Methods

*``public`` getSchema()

---

## Gpupo\SteloSdk\Order\Cart\Item

* Parent class: Gpupo\CommonSdk\Entity\EntityAbstract
* This class implements: Gpupo\CommonSdk\Entity\EntityInterface

#### Methods

*``public`` getSchema()

---

## Gpupo\SteloSdk\Transaction\Manager

* Parent class: Gpupo\CommonSdk\Entity\ManagerAbstract

#### Methods

*``public`` createFromOrder(\Gpupo\SteloSdk\Order\Order $order)

##### Arguments
$order **[Gpupo\SteloSdk\Order\Order](#gpupostelosdkorderorder)**
---

*``public`` deleteById($itemId)

##### Arguments
$itemId **mixed**
---

*``public`` findById($itemId)

##### Arguments
$itemId **mixed**
---

*``protected`` factoryFromStatusResponse(\Gpupo\Common\Entity\Collection $response)

##### Arguments
$response **Gpupo\Common\Entity\Collection**
---

*``protected`` factoryFromCreateResponse(\Gpupo\CommonSdk\Response $response)

##### Arguments
$response **Gpupo\CommonSdk\Response**
---

*``public`` update(\Gpupo\CommonSdk\Entity\EntityInterface $entity, \Gpupo\CommonSdk\Entity\EntityInterface $existent)

##### Arguments
$entity **Gpupo\CommonSdk\Entity\EntityInterface**
---

$existent **Gpupo\CommonSdk\Entity\EntityInterface**
---

---

## Gpupo\SteloSdk\Client\Client

* Parent class: Gpupo\CommonSdk\Client\ClientAbstract
* This class implements: Gpupo\CommonSdk\Client\ClientInterface

#### Methods

*``public`` getDefaultOptions()

*``protected`` renderAuthorization()

---

## Gpupo\SteloSdk\Order\Customer\Customer

* Parent class: Gpupo\CommonSdk\Entity\EntityAbstract
* This class implements: Gpupo\CommonSdk\Entity\EntityInterface

#### Methods

*``public`` getSchema()

---

## Gpupo\SteloSdk\Order\Customer\BillingAddress

* Parent class: Gpupo\CommonSdk\Entity\EntityAbstract
* This class implements: Gpupo\CommonSdk\Entity\EntityInterface

#### Methods

*``public`` getSchema()

---

## Gpupo\SteloSdk\View\Lightbox

* Parent class: Gpupo\CommonSdk\Entity\EntityAbstract
* This class implements: Gpupo\CommonSdk\Entity\EntityInterface

#### Methods

*``public`` getSchema()

*``public`` __construct($checkoutUrl)

##### Arguments
$checkoutUrl **mixed**
---

*``public`` __toString()

*``public`` getCheckoutUrl()

*``public`` setCheckoutUrl()

---

## Gpupo\SteloSdk\Factory

* Parent class: Gpupo\CommonSdk\FactoryAbstract

#### Methods

*``public`` setClient(array $clientOptions)

##### Arguments
$clientOptions **array**
---

*``public`` getNamespace()

*``protected`` getSchema($namespace)

##### Arguments
$namespace **mixed**
---

---

## Gpupo\SteloSdk\Order\Customer\Phone\Phone

* Parent class: Gpupo\CommonSdk\Entity\CollectionAbstract

#### Methods

*``public`` factoryElement($data)

##### Arguments
$data **mixed**
---

