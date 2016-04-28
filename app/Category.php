<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "danh_muc";

    public function getProducts(){
      return $this->hasMany('App\Product', 'IdDanhMuc', 'idDanhMuc');
    }

}
