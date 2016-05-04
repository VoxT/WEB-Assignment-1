<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "giao_dich";

    public function getProduct(){
    	return Order::belongsTo('App\Product', 'idDienThoai', 'idDienThoai');
    }

    public function getOrderById($orderId) {
    	return Order::where('idGiaoDich', $orderId)->first();
    }

    public function getOrderByUser($userId){
    	return Order::orderBy('trangThaiThanhToan')->where('idUser', $userId)->get();
    }

}
