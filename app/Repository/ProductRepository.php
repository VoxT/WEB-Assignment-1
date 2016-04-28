<?php
namespace App\Repository;

use App\Product;

class ProductRepository{
  /**
  * Get products by gender and type.
  *
  * @param String $gender, $type.
  * @return Collection
  */
  public function getAllProducts(){

    return Product::orderBy('idDienThoai')->take('10')
                                 ->get();
  }

  /**
  * Get product by sku and color.
  *
  * @param String $product_sku, $color_sku.
  * @return Collection
  */
  public function getProductBy($product_sku, $color_sku){
    
  }
}
?>
