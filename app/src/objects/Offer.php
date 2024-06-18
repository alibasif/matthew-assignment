<?php
namespace App\Objects;

/*
*   Offer: It contains the offer, applicable on a product using product code.
*/
class Offer{

    public $ProductCode;
    public $Type;

    function __construct($productCode, $type){
        $this->ProductCode = $productCode;
        $this->Type = $type;
    }
}
