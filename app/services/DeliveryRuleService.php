<?php
namespace App\Services;

require_once './app/src/objects/DeliveryRule.php'; 
use App\Objects\DeliveryRule;

/*
*   Delivery Rules Service: Responsible for Managing Products Delivery Rules for Incentives
*/
class DeliveryRuleService{

    private $DeliveryRules = [];

    function __construct(){
        
        $this->DeliveryRules = [
            new DeliveryRule(0,4.95),
            new DeliveryRule(50,2.95),
            new DeliveryRule(90,0)
        ];
    }
    /*
    *   Get All Delivery Rules
    */
    public function GetDeliveryRules(){
        return $this->DeliveryRules;
    }

    /*
    *   Get Delivery Rule by Applicable on Order Amount
    */
    public function GetDeliveryRule($Amount){
        $DeliveryRule = null;
        foreach($this->DeliveryRules as $Rule){
            if($Amount > $Rule->Threshold){
                $DeliveryRule = $Rule;
            }
        }
        return $DeliveryRule;
    }
    
}