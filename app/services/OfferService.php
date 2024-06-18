<?php
namespace App\Services;

require_once './app/src/objects/Offer.php'; 
use App\Objects\Offer;

/*
*   Delivery Rules Service: Responsible for Managing Products Delivery Rules for Incentives
*/
class OfferService{

    private $Offers = [];

    function __construct(){
        
        $this->Offers = [
            new Offer('R01','BORGSHP')   // BUY ONE RED SECOND HALF PRICE
        ];
    }
    /*
    *   Get All Offers
    */
    public function GetOffers(){
        return $this->Offers;
    }

    /*
    *   Get Offers on a Product by Product Code
    */
    public function GetOffer($ProductCode){
        $Offers = [];
        foreach($this->Offers as $_Offer){
            if($ProductCode == $_Offer->ProductCode){
                $Offers[] = $_Offer;
            }
        }
        return $Offers;
    }
    
}