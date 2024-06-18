# Sales Assignment

The assignment project is developed in PHP. Download the project from [GIT]: (https://github.com).

### Implementation
- Implemented a basket that acts like an order entity.
- We can add multiple order items into the basket.
- Every order item has a product and amount associated. Sometimes the amount is the same as of product, sometimes we apply some discount or offer to that amount.
- On adding a new order item, we check if there is any offer available on the product, if available, we apply the offer, recalculate the amount, and add it to the basket.
- As per the assignment, we have only one offer implemented, **BORGSHP**, which is to buy one red and get second red at half price.
- Delivery charges are also implemented as per the assignment.
- There are services in the project, that provide data on products, delivery rules, and offers available.
- On every basket, we can calculate **Total Amount**, **Delivery Charges** also can **Print** bill.

### Output:



## Installation

Download the project from the GIT Repository. Unzip the folder and place it in any folder where PHP is working. 

### Prerequisites
```php
- PHP 7.4
```
### Installation Steps

1. Goto [GitHub]:(https://github.com)
2. Download the project files
3. Unzip folder
4. Open command prompt
5. Navigate to the root folder of the project
6. Run the following command on command prompt
```php
- php index.php
```

## File Structure
```
MATTHEW-ASSIGNMENT/
│
├── app
│ │── services
│ │  └── ProductCatalogueService.php
│ │  └── DeliveryRuleService.php
│ │  └── OfferService.php
│ │
│ └── src
│    │── objects
│    │  └── DeliveryRule.php
│    │  └── OrderItem.php
│    │  └── Product.php
│    │  └── Offer.php
│    │
│    └── Basket.php
│
├── index.php
└── README.md
```

## File Structure - Explained

- **App:** Centralizes all components required to execute the application, ensuring essential assets are organized and accessible.

- **Services:** Serves as a data hub, facilitating the retrieval and application of crucial information such as product details, delivery regulations, and promotional offers during runtime.

- **Src:** Contains the core elements of the application, including objects, entities, and classes, promoting a structured approach to development and maintenance.

- **Basket.php:** Functions as a pivotal component responsible for managing order processes. It enables dynamic manipulation of orders by facilitating addition, removal, and offer application functionalities. Moreover, it generates bills, breakdowns of billed amounts, and delivery charges.

- **Index.php:** Marks the initiation point of the application's execution flow. It serves as the primary interface where orders are initiated and subsequent operational sequences are activated.

## Examples

```php
$Order = new Order();

# Add a product in the order
$Order->AddItem(new OrderItem($Product));

# Get Order Amount / Billing Amount
$Order->OrderAmount();

# Get Delivery Charges of an Order
$Order->GetDeliveryCharges();

# Print Bill
$Order->Print();
```
