<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "giao_dich";
    protected $primaryKey  = "idGiaoDich";

    public function getProduct(){
    	return Order::belongsTo('App\Product', 'idDienThoai', 'idDienThoai');
    }

    public function getOrderById($orderId) {
    	return Order::where('idGiaoDich', $orderId)->first();
    }

    public function getOrderByUser($userId){
    	return Order::orderBy('trangThaiThanhToan')->orderBy('ngayTao', 'DESC')->where('idUser', $userId)->get();
    }

}
