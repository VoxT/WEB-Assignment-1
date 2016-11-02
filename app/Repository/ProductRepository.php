<?php
namespace App\Repository;

use App\Product;
use App\Category;

class ProductRepository{

  public function getAllProducts(){

    return Product::orderBy('ngayTao', 'DESC')->orderBy('giamGia', 'DESC')->take('20')
                                 ->get();
  }

  public function getProductBy($productId){
    return Product::where('idDienThoai', $productId)->first();
  }

  public function getProductByCategory($categoryId){
    return Product::where('idDanhMuc', $categoryId)->get();
  }

  public function getHotProduct(){
      return $product = Product::get()->sortBy(function($product)
      {
          return $product->getOrder->count();
      });
  }

  public function getNewProduct(){
    return Product::where('ngayTao', '>', date('Y/m/d H:m:s', strtotime('7 days ago')))->get();
  }

}
?>
