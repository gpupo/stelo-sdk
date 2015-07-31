#API Docs

* Gpupo
    * Gpupo\SteloSdk
        * Gpupo\SteloSdk\Order
            * Gpupo\SteloSdk\Order\Cart
                * [Cart](#gpupostelosdkordercartcart)
                * [Item](#gpupostelosdkordercartitem)
            * Gpupo\SteloSdk\Order\Customer
                * [ShippingAddress](#gpupostelosdkordercustomershippingaddress)
                * Gpupo\SteloSdk\Order\Customer\Phone
                    * [Item](#gpupostelosdkordercustomerphoneitem)
                    * [Phone](#gpupostelosdkordercustomerphonephone)
                * [Customer](#gpupostelosdkordercustomercustomer)
                * [BillingAddress](#gpupostelosdkordercustomerbillingaddress)
            * [Order](#gpupostelosdkorderorder)
            * [Payment](#gpupostelosdkorderpayment)
        * Gpupo\SteloSdk\Transaction
            * [Transaction](#gpupostelosdktransactiontransaction)
            * [Manager](#gpupostelosdktransactionmanager)
        * Gpupo\SteloSdk\Client
            * [Client](#gpupostelosdkclientclient)
        * Gpupo\SteloSdk\View
            * [Lightbox](#gpupostelosdkviewlightbox)
        * [Factory](#gpupostelosdkfactory)

---

## Gpupo\SteloSdk\Order\Cart\Cart

``Parent`` Gpupo\CommonSdk\Entity\CollectionAbstract

<!--Methods-->

##### ``public`` factoryElement($data)
    

<!--arguments-->
 Argument   | Type          | Description
------------| :-------------| :-------------
$data | mixed | 

---

## Gpupo\SteloSdk\Order\Customer\ShippingAddress

``Parent`` [Gpupo\SteloSdk\Order\Customer\BillingAddress](#gpupostelosdkordercustomerbillingaddress)

<!--Methods-->

##### ``public`` getSchema()
    

---

## Gpupo\SteloSdk\Order\Order

``Parent`` Gpupo\CommonSdk\Entity\EntityAbstract
``Implements`` Gpupo\CommonSdk\Entity\EntityInterface

<!--Methods-->

##### ``public`` getSchema()
    

##### ``public`` toArray()
    

##### ``public`` getId()
    

##### ``public`` setId()
    

##### ``public`` getTransactionType()
    

##### ``public`` setTransactionType()
    

##### ``public`` getShippingBehavior()
    

##### ``public`` setShippingBehavior()
    

##### ``public`` getCountry()
    

##### ``public`` setCountry()
    

##### ``public`` getCart()
    

##### ``public`` setCart()
    

##### ``public`` getPayment()
    

##### ``public`` setPayment()
    

##### ``public`` getCustomer()
    

##### ``public`` setCustomer()
    

##### ``public`` getChangeShipment()
    

##### ``public`` setChangeShipment()
    

---

## Gpupo\SteloSdk\Transaction\Transaction

``Parent`` Gpupo\CommonSdk\Entity\EntityAbstract
``Implements`` Gpupo\CommonSdk\Entity\EntityInterface

<!--Methods-->

##### ``public`` getSchema()
    

##### ``public`` getId()
    

##### ``public`` setId()
    

##### ``public`` getStatusCode()
    

##### ``public`` setStatusCode()
    

##### ``public`` getStatusMessage()
    

##### ``public`` setStatusMessage()
    

##### ``public`` getFreight()
    

##### ``public`` setFreight()
    

##### ``public`` getAmount()
    

##### ``public`` setAmount()
    

---

## Gpupo\SteloSdk\Order\Customer\Phone\Item

``Parent`` Gpupo\CommonSdk\Entity\EntityAbstract
``Implements`` Gpupo\CommonSdk\Entity\EntityInterface

<!--Methods-->

##### ``public`` getSchema()
    

---

## Gpupo\SteloSdk\Order\Payment

``Parent`` Gpupo\CommonSdk\Entity\EntityAbstract
``Implements`` Gpupo\CommonSdk\Entity\EntityInterface

<!--Methods-->

##### ``public`` getSchema()
    

---

## Gpupo\SteloSdk\Order\Cart\Item

``Parent`` Gpupo\CommonSdk\Entity\EntityAbstract
``Implements`` Gpupo\CommonSdk\Entity\EntityInterface

<!--Methods-->

##### ``public`` getSchema()
    

---

## Gpupo\SteloSdk\Transaction\Manager

``Parent`` Gpupo\CommonSdk\Entity\ManagerAbstract

<!--Methods-->

##### ``public`` createFromOrder(\Gpupo\SteloSdk\Order\Order $order)
    Cria uma transação a partir de um objeto Order

<!--arguments-->
 Argument   | Type          | Description
------------| :-------------| :-------------
$order | [Gpupo\SteloSdk\Order\Order](#gpupostelosdkorderorder) | &lt;p&gt;Objeto Pedido&lt;/p&gt;

##### ``public`` deleteById($itemId)
    

<!--arguments-->
 Argument   | Type          | Description
------------| :-------------| :-------------
$itemId | mixed | 

##### ``public`` findById($itemId)
    

<!--arguments-->
 Argument   | Type          | Description
------------| :-------------| :-------------
$itemId | mixed | 

##### ``protected`` factoryFromStatusResponse(\Gpupo\Common\Entity\Collection $response)
    

<!--arguments-->
 Argument   | Type          | Description
------------| :-------------| :-------------
$response | Gpupo\Common\Entity\Collection | 

##### ``protected`` factoryFromCreateResponse(\Gpupo\CommonSdk\Response $response)
    

<!--arguments-->
 Argument   | Type          | Description
------------| :-------------| :-------------
$response | Gpupo\CommonSdk\Response | 

---

## Gpupo\SteloSdk\Client\Client

``Parent`` Gpupo\CommonSdk\Client\ClientAbstract
``Implements`` Gpupo\CommonSdk\Client\ClientInterface

<!--Methods-->

##### ``public`` getDefaultOptions()
    

##### ``protected`` renderAuthorization()
    

---

## Gpupo\SteloSdk\Order\Customer\Customer

``Parent`` Gpupo\CommonSdk\Entity\EntityAbstract
``Implements`` Gpupo\CommonSdk\Entity\EntityInterface

<!--Methods-->

##### ``public`` getSchema()
    

---

## Gpupo\SteloSdk\Order\Customer\BillingAddress

``Parent`` Gpupo\CommonSdk\Entity\EntityAbstract
``Implements`` Gpupo\CommonSdk\Entity\EntityInterface

<!--Methods-->

##### ``public`` getSchema()
    

---

## Gpupo\SteloSdk\View\Lightbox

``Parent`` Gpupo\CommonSdk\Entity\EntityAbstract
``Implements`` Gpupo\CommonSdk\Entity\EntityInterface

<!--Methods-->

##### ``public`` getSchema()
    

##### ``public`` __construct($checkoutUrl)
    

<!--arguments-->
 Argument   | Type          | Description
------------| :-------------| :-------------
$checkoutUrl | mixed | 

##### ``public`` __toString()
    

##### ``public`` getCheckoutUrl()
    

##### ``public`` setCheckoutUrl()
    

---

## Gpupo\SteloSdk\Factory

``Parent`` Gpupo\CommonSdk\FactoryAbstract

<!--Methods-->

##### ``public`` setClient(array $clientOptions)
    

<!--arguments-->
 Argument   | Type          | Description
------------| :-------------| :-------------
$clientOptions | array | 

##### ``public`` getNamespace()
    

##### ``protected`` getSchema($namespace)
    

<!--arguments-->
 Argument   | Type          | Description
------------| :-------------| :-------------
$namespace | mixed | 

---

## Gpupo\SteloSdk\Order\Customer\Phone\Phone

``Parent`` Gpupo\CommonSdk\Entity\CollectionAbstract

<!--Methods-->

##### ``public`` factoryElement($data)
    

<!--arguments-->
 Argument   | Type          | Description
------------| :-------------| :-------------
$data | mixed | 
