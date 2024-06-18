<?php
namespace App\Objects;

require_once './app/src/objects/Product.php';

use App\Objects\Product;

class OrderItem{

    private Product $Product;
    private $Quantity = 1;
    private $Amount;

    function __construct(Product $product){
        $this->Product = $product;
        $this->Amount = $product->Price;
    }
    
    function GetQuantity(){
        return $this->Quantity;
    }

    function SetAmount($amount){
        $this->Amount = $amount;
    }

    function GetProduct(){
        return $this->Product;
    }

    function GetAmount(){
        return $this->Amount;
    }
}
