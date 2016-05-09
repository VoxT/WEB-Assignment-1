<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "dien_thoai";

    public function getCategory(){
      return $this->belongsTo('App\Category', 'IdDanhMuc', 'idDanhMuc');
    }

    public function getOrder(){
    	return $this->hasMany('App\Order', 'idDienThoai', 'idDienThoai');
    }

    public function getComment(){
    	return $this->hasMany('App\Comment', 'idDienThoai', 'idDienThoai');
    }

}
