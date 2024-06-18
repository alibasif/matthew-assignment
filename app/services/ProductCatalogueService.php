<?php
namespace App\Services;

require_once './app/src/objects/Product.php'; 
use App\Objects\Product;

/*
*   Product Service: Responsible for Managing Products Data
*/
class ProductCatalogueService{

    private $Products = [];
    function __construct(){
        $this->Products = [
            new Product('Red Widget',32.95,'R01'),
            new Product('Green Widget',24.95,'G01'),
            new Product('Blue Widget',7.95,'B01')
        ];
    }
    
    /*
    *   Get All Products
    */
    public function GetProducts(){
        return $this->Products;
    }

    /*
    *   Get Product by Product Code
    */
    public function GetProduct($Code){
        $SelectedProduct = null;
        foreach($this->Products as $Product){
            if($Product->Code == $Code){
                $SelectedProduct = $Product;
                break;
            }
        }
        return $SelectedProduct;
    }
}