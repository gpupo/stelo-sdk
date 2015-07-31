---
 title: API
---

## Gpupo\SteloSdk\Order\Cart\Cart

* Parent class: Gpupo\CommonSdk\Entity\CollectionAbstract

### Methods

* factoryElement($data) ``public``

##### Arguments
* $data **mixed**

---

## Gpupo\SteloSdk\Order\Customer\ShippingAddress

* Parent class: [Gpupo\SteloSdk\Order\Customer\BillingAddress](#gpupostelosdkordercustomerbillingaddress)

### Methods

* getSchema() ``public``

---

## Gpupo\SteloSdk\Order\Order

* Parent class: Gpupo\CommonSdk\Entity\EntityAbstract
* This class implements: Gpupo\CommonSdk\Entity\EntityInterface

### Methods

* getSchema() ``public``

* toArray() ``public``

* getId() ``public``

* setId() ``public``

* getTransactionType() ``public``

* setTransactionType() ``public``

* getShippingBehavior() ``public``

* setShippingBehavior() ``public``

* getCountry() ``public``

* setCountry() ``public``

* getCart() ``public``

* setCart() ``public``

* getPayment() ``public``

* setPayment() ``public``

* getCustomer() ``public``

* setCustomer() ``public``

* getChangeShipment() ``public``

* setChangeShipment() ``public``

---

## Gpupo\SteloSdk\Transaction\Transaction

* Parent class: Gpupo\CommonSdk\Entity\EntityAbstract
* This class implements: Gpupo\CommonSdk\Entity\EntityInterface

### Methods

* getSchema() ``public``

* getId() ``public``

* setId() ``public``

* getStatusCode() ``public``

* setStatusCode() ``public``

* getStatusMessage() ``public``

* setStatusMessage() ``public``

* getFreight() ``public``

* setFreight() ``public``

* getAmount() ``public``

* setAmount() ``public``

---

## Gpupo\SteloSdk\Order\Customer\Phone\Item

* Parent class: Gpupo\CommonSdk\Entity\EntityAbstract
* This class implements: Gpupo\CommonSdk\Entity\EntityInterface

### Methods

* getSchema() ``public``

---

## Gpupo\SteloSdk\Order\Payment

* Parent class: Gpupo\CommonSdk\Entity\EntityAbstract
* This class implements: Gpupo\CommonSdk\Entity\EntityInterface

### Methods

* getSchema() ``public``

---

## Gpupo\SteloSdk\Order\Cart\Item

* Parent class: Gpupo\CommonSdk\Entity\EntityAbstract
* This class implements: Gpupo\CommonSdk\Entity\EntityInterface

### Methods

* getSchema() ``public``

---

## Gpupo\SteloSdk\Transaction\Manager

* Parent class: Gpupo\CommonSdk\Entity\ManagerAbstract

### Methods

* createFromOrder(\Gpupo\SteloSdk\Order\Order $order) ``public``

##### Arguments
* $order **[Gpupo\SteloSdk\Order\Order](#gpupostelosdkorderorder)**

* deleteById($itemId) ``public``

##### Arguments
* $itemId **mixed**

* findById($itemId) ``public``

##### Arguments
* $itemId **mixed**

* factoryFromStatusResponse(\Gpupo\Common\Entity\Collection $response) ``protected``

##### Arguments
* $response **Gpupo\Common\Entity\Collection**

* factoryFromCreateResponse(\Gpupo\CommonSdk\Response $response) ``protected``

##### Arguments
* $response **Gpupo\CommonSdk\Response**

* update(\Gpupo\CommonSdk\Entity\EntityInterface $entity, \Gpupo\CommonSdk\Entity\EntityInterface $existent) ``public``

##### Arguments
* $entity **Gpupo\CommonSdk\Entity\EntityInterface**
* $existent **Gpupo\CommonSdk\Entity\EntityInterface**

---

## Gpupo\SteloSdk\Client\Client

* Parent class: Gpupo\CommonSdk\Client\ClientAbstract
* This class implements: Gpupo\CommonSdk\Client\ClientInterface

### Methods

* getDefaultOptions() ``public``

* renderAuthorization() ``protected``

---

## Gpupo\SteloSdk\Order\Customer\Customer

* Parent class: Gpupo\CommonSdk\Entity\EntityAbstract
* This class implements: Gpupo\CommonSdk\Entity\EntityInterface

### Methods

* getSchema() ``public``

---

## Gpupo\SteloSdk\Order\Customer\BillingAddress

* Parent class: Gpupo\CommonSdk\Entity\EntityAbstract
* This class implements: Gpupo\CommonSdk\Entity\EntityInterface

### Methods

* getSchema() ``public``

---

## Gpupo\SteloSdk\View\Lightbox

* Parent class: Gpupo\CommonSdk\Entity\EntityAbstract
* This class implements: Gpupo\CommonSdk\Entity\EntityInterface

### Methods

* getSchema() ``public``

* __construct($checkoutUrl) ``public``

##### Arguments
* $checkoutUrl **mixed**

* __toString() ``public``

* getCheckoutUrl() ``public``

* setCheckoutUrl() ``public``

---

## Gpupo\SteloSdk\Factory

* Parent class: Gpupo\CommonSdk\FactoryAbstract

### Methods

* setClient(array $clientOptions) ``public``

##### Arguments
* $clientOptions **array**

* getNamespace() ``public``

* getSchema($namespace) ``protected``

##### Arguments
* $namespace **mixed**

---

## Gpupo\SteloSdk\Order\Customer\Phone\Phone

* Parent class: Gpupo\CommonSdk\Entity\CollectionAbstract

### Methods

* factoryElement($data) ``public``

##### Arguments
* $data **mixed**

