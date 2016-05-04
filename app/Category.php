<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "danh_muc";

    public function getProducts(){
      return $this->hasMany('App\Product', 'IdDanhMuc', 'idDanhMuc');
    }

    public function getSubCategory(){
    	return $this->hasMany('App\Category', 'idDanhMucCha', 'idDanhMuc');
    }

    public function getAllCategory(){
    	return $this->get();
    }

    public function getSubCategoryById($categoryId){
    	return $this->where('idDanhMucCha', $categoryId)->get();
    }

    public function getCategoryNameById($categoryId){
    	return $this->where('idDanhMuc', $categoryId)->first()->tenLoaiDienThoai;
    }

    
}
