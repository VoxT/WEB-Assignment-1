<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Admin;

use App\Repository\ProductRepository as Products;

use App\Product;

use App\Category;

use App\Order;

use Auth;

class PagesController extends Controller
{

	/**
     * The product repository instance.
     *
     * @var ProductRepository
     */
    protected $products;
    protected $category;
    protected $order;

    /**
     * Create a new controller instance.
     *
     * @param  ProductRepository  $products
     * @return void
     */
    public function __construct(Products $products, Category $category, Order $order)
    {
        $this->products = $products;
        $this->category = $category;
        $this->order = $order;
    }

  /**
   * Display home page.
   *
   * @param  Request  $request
   * @return Response
   */
    public function index(Request $request){
      return view('index');
    }

    /**
     * Display a list of products by gender and type.
     *
     * @param  String $gender
     *         String $type
     * @return Response
     */
     public function showAllProducts(){
       return view('page.home', [
         'products' => $this->products->getAllProducts(), 
         'category' => $this->category->getAllCategory(),
         'title' => 'Sản Phẩm Mới'
       ]);
     }


  	public function about() {
  		return view('page/about');
  	}

    public function contact() {
    	$user = new Admin;
    	//$user->insert('votienthieu@gmail.com', '123456', 'Vo Tien Thieu');
    	$allUser = $user->selectAll();
    	return view('page.contact')->with('admin', $allUser);
    }
   
   public function productInfo($productId) {

      return view('page.productInfo', [
            'product' => $this->products->getProductBy($productId)
        ]);
   }

   public function showCategoryProducts($categoryId){
      return view('page.home', [
          'products' => $this->products->getProductByCategory($categoryId), 
          'category' => $this->category->getAllCategory(),
          'title' => $this->category->getCategoryNameById($categoryId)
        ]);
   }

   public function showProductsByBand($categoryId){
      return view('page.band', [
          'band' => $this->category->getSubCategoryById($categoryId), 
          'category' => $this->category->getAllCategory(),
          'title' => $this->category->getCategoryNameById($categoryId)
        ]);
   }

   public function userInfo(){
      return view('page.userInfo', [
          'user' => Auth::user(), 
          'orders' => $this->order->getOrderByUser(Auth::user()->id)
        ]);
   }
}
