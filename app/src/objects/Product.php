<?php
namespace App\Objects;

/*
*   Product: Key entity holding Product name, price and code.
*/
class Product{

    public $Name;
    public $Price;
    public $Code;

    function __construct($name, $price, $code){
        $this->Name = $name;
        $this->Price = $price;
        $this->Code = $code;
    }
}