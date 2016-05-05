<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Admin;

use App\Repository\ProductRepository as Products;

use App\Product;

use Auth;

use App\Order;

class OrderController extends Controller
{
    protected $products;
    protected $orders;

    /**
     * Create a new controller instance.
     *
     * @param  ProductRepository  $products
     * @return void
     */
    public function __construct(Products $products, Order $orders)
    {
        $this->products = $products;
        $this->orders = $orders;

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

    public function showOrderForm($productId){
        return view('page.order', [
                'product' => $this->products->getProductBy($productId),
                'user' => Auth::user()
            ]);
    }


    public function order($productId, Request $request){
        $orderId = Order::insertGetId([
                'idUser' => $request->idUser,
                'tenNguoiMua' => $request->name,
                'sdtNguoiMua' => $request->number,
                'idDienThoai' => $request->idDienThoai,
                'diachi' => $request->diachi,
                'trangThaiThanhToan' => '0',
                'email' => $request->email
            ]);

            return redirect('viewOrder-'.$orderId);
    }

    public function deleteOrder(Request $request){
        Order::destroy($request->id);

        return redirect('userinfo');
    }

    public function viewOrder($orderId){
        return view('page.viewOrder', [
                'product' => $this->orders->getOrderById($orderId)->getProduct,
                'order' => $this->orders->getOrderById($orderId)
            ]);
    }
}
