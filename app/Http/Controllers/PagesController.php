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

use App\Comment;

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
    protected $comments;

    /**
     * Create a new controller instance.
     *
     * @param  ProductRepository  $products
     * @return void
     */
    public function __construct(Products $products, Category $category, Order $order, Comment $comments)
    {
        $this->products = $products;
        $this->category = $category;
        $this->order = $order;
        $this->comments = $comments;
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
          'title' => $this->category->getCategoryNameById($categoryId)
        ]);
   }

   public function showProductsByBand($categoryId){
      return view('page.band', [
          'band' => $this->category->getSubCategoryById($categoryId), 
          'title' => $this->category->getCategoryNameById($categoryId)
        ]);
   }

   public function userInfo(){
      return view('page.userInfo', [
          'user' => Auth::user(), 
          'orders' => $this->order->getOrderByUser(Auth::user()->id)
        ]);
   }

   public function muatragop(){
      return view('page.tragop');
   }

   public function search(Request $request) {
      return view('page.search', [
        'title' => 'Kết Quả Tìm Kiếm '.$request->keyword,
        'products' => Product::where('ten', 'LIKE', '%'.$request->keyword.'%')->get()
   ]);
  }

  public function hotproduct(){
      return view('page.home', [
            'products' => $this->products->getHotProduct(),
            'title' => 'Sản Phẩm Bán Chạy'
        ]);
  }


  public function insertComment(){

      $id = Comment::insertGetId([
            'idDienThoai' => $request->input('idDT'),
            'idUser' => $request->input('idUser'),
            'idBinhLuanCha' => $request->input('idCha'),
            'noiDung' => $request->input('comment'),
            'thoiGian' => timestamps()
        ]);

     return Response::json($this->comments->getCommentById($id));

  }
}
