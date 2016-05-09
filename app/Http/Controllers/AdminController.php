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

use App\User;

class AdminController extends Controller
{

	/**
     * The product repository instance.
     *
     * @var ProductRepository
     */
    protected $products;
    protected $category;
    protected $order;
    protected $user;

    /**
     * Create a new controller instance.
     *
     * @param  ProductRepository  $products
     * @return void
     */
    public function __construct(Products $products, Category $category, Order $order, User $user)
    {
        $this->middleware('admin');
        $this->products = $products;
        $this->category = $category;
        $this->order = $order;
        $this->user = $user;
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

    public function wellcome(){
      return view('admin.index', [
            'order' => $this->order->getOrderByStatus(0),
            'products' => $this->products->getNewProduct(),
            'user' => $this->user->getAllUser()
        ]);
    }

    public function order(){

      
    }

    public function newOrder(){
        return view('admin.order', [
            'title' => 'Đơn Đặt Hàng Chưa Xác Nhận',
            'order' => $this->order->getOrderByStatus(0)
          ]);

    }

    public function shipOrder(){
        return view('admin.order', [
            'title' => 'Đơn Đặt Hàng Đang Giao',
            'order' => $this->order->getOrderByStatus(1)
          ]);

    }

    public function  completeOrder(){
        return view('admin.order', [
            'title' => 'Đơn Đặt Hàng Đã Hoàn Thành',
            'order' => $this->order->getOrderByStatus(2)
          ]);

    }

    public function user(){
        return view('admin.user', [
              'title' => 'Người Dùng Đăng Kí', 
              'user' => $this->user->getAllUser()
          ]);
    }

    public function userInfo($userId) {
        return view('admin.userInfo', [
              'user' => $this->user->getUserInfoById($userId), 
              'title' => 'Các Sản Phẩm Đã Đặt',
              'order' =>  $this->order->getOrderByUser($userId)
          ]);
    }

    public function deleteUser($userId){
      $username = $this->user->getUserInfoById($userId)->name;
      if($this->user->deleteUser($userId))
        return redirect('manager/user')->with( [
                'title' => 'Người Dùng Đăng Kí', 
                'user' => $this->user->getAllUser(),
                'success' => $username
            ]);
      else 
         return redirect('manager/user')->with( [
                'title' => 'Người Dùng Đăng Kí', 
                'user' => $this->user->getAllUser(),
                'error' => $username
            ]);
    }

    public function products(){
      return view('admin.product', [
            'title' => 'Sản Phẩm', 
            'product' => $this->products->getAllProducts(), 
            
        ]);
    }

}
