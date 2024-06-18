<?php
namespace App\Objects;

/*
*   Delivery Rule: It states that on what threashold of amount, what cost will be charged for delivery.
*/
class DeliveryRule{

    public $Threshold; 
    public $Cost;

    function __construct($threshold, $cost){
        $this->Threshold = $threshold;
        $this->Cost = $cost;
    }
}
