<?php
namespace App\Objects;

require_once './app/services/DeliveryRuleService.php'; 
require_once './app/services/OfferService.php'; 
require_once './app/src/objects/DeliveryRule.php'; 
require_once './app/src/objects/OrderItem.php'; 

use App\Services\DeliveryRuleService;
use App\Services\OfferService;
use App\Objects\DeliveryRule;
use App\Objects\OrderItem;

/*
*   Basket: An order to place, which will contain some items and products add remove option
*/
class Basket{

    private $OrderItems = array();

    /*
    * Dependencies of Order Class
    */
    private $DeliveryService;
    private $Offers;

    function __construct(){
        // Inject Dependencies
        $this->DeliveryService = new DeliveryRuleService();
        $this->Offers = new OfferService();
    }

    function AddItem(OrderItem $orderItem){
        $orderItem->SetAmount($this->CalculateProductAmount($orderItem,$orderItem->GetProduct()->Price));

        $this->OrderItems[] = $orderItem;
    }

    function GetItems(){
        return $this->OrderItems;
    }

    function Total(){
        $Amount = 0;
        foreach($this->OrderItems as $index => $OrderItem){
            $Amount += $OrderItem->GetAmount();
        }
        return $Amount;
    }

    function DeliveryCharges(){

        $DeliveryRule = $this->DeliveryService->GetDeliveryRule($this->Total());

        return $DeliveryRule->Cost;
    }

    function RemoveItem($itemNumber){
        unset($this->OrderItems[$itemNumber]);
        return $this->OrderItems;
    }

    private function CalculateProductAmount($Item,$itemAmount){
        
        /*
        * Check for Offers - Loop through every offer we have on that product
        */

        foreach($this->Offers->GetOffer($Item->GetProduct()->Code) as $Offer){
            $itemAmount = $this->ApplyOffer($Item, $Offer, $itemAmount);
        }

        return $itemAmount;
    }

    private function ApplyOffer($OrderItem,$Offer,$itemAmount){
        /*
        * Implement Actions based on Offer Type
        */
       
        switch($Offer->Type){
            case 'BORGSHP':       // BUY ONE RED SECOND HALF PRICE
                
                /*
                * Loop through every order item and check if we already have R01, then slash the amount of second R01 by half
                */
                $ItemCount = 0;
                foreach($this->OrderItems as $Item){
                    if($Item->GetProduct()->Code == $OrderItem->GetProduct()->Code && $OrderItem->GetProduct()->Code == 'R01'){
                        $ItemCount++;
                    }
                }
                /*
                * Check if Product Exists in Odd number, because every second / even product will get this offer
                */
                
                if($ItemCount%2 != 0){
                    $itemAmount = $itemAmount / 2;
                }
                break;
            default:
            $itemAmount = $itemAmount;
        }
        
        return $itemAmount;
    }

    function Print(){
        //Get Order Amount to be paid
        $OrderAmount = $this->Total();

        //Get Delivery Charges
        $DeliveryCharges = $this->DeliveryCharges();
        
        var_dump("Order Placed:");
        foreach($this->GetItems() as $Item){
            var_dump("Product : ".$Item->GetProduct()->Name.' ('.$Item->GetProduct()->Code.') - Amount $'.$Item->GetAmount());
        }
        var_dump("----------------------------------------------");
        var_dump("Total Amount = $".$OrderAmount." & Delivery Charges = ".$DeliveryCharges);
    }

}
