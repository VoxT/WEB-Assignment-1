<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Admin;

use App\Repository\ProductRepository as Products;

use App\Product;

class PagesController extends Controller
{

	/**
     * The product repository instance.
     *
     * @var ProductRepository
     */
    protected $products;

    /**
     * Create a new controller instance.
     *
     * @param  ProductRepository  $products
     * @return void
     */
    public function __construct(Products $products)
    {
        $this->products = $products;
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
         'products' => $this->products->getAllProducts()
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
   
}
