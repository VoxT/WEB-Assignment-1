<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "dien_thoai";

    public function getCategory(){
      return $this->belongsTo('App\Category', 'IdDanhMuc', 'idDanhMuc');
    }

}
