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
}
?>
