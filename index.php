<?php
require_once './app/src/Basket.php';
require_once './app/src/objects/OrderItem.php';
require_once './app/services/ProductCatalogueService.php';

use App\Objects\Basket;
use App\Objects\OrderItem;
use App\Services\ProductCatalogueService;


/*
* Get All Products from Catalogue
*/
$ProductCatalogue = new ProductCatalogueService();
$Products = $ProductCatalogue->GetProducts();

/*
| Create Order & Start Adding Items
*/
$Basket = new Basket();

//Add a product (R01) in the order
$Basket->AddItem(new OrderItem($Products[0]));

//Add same product (R01) again in the order
$Basket->AddItem(new OrderItem($Products[0]));

//Add same product (R01) again in the order
$Basket->AddItem(new OrderItem($Products[0]));

//Add another product (G01) again in the order
$Basket->AddItem(new OrderItem($Products[1]));

$Basket->Print();