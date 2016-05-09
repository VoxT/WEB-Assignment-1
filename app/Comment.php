<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $table = "binh_luan";
    protected $primaryKey  = "idBinhLuan";

    public function getUser(){
    	return Comment::belongsTo('App\User', 'idUser', 'id');
    }

    public function getChildComment(){
    	return Comment::hasMany('App\Comment', 'idBinhLuanCha', 'idBinhLuan');
    }

    public function getCommentById($id){

    	return Comment::where('idBinhLuan', $id)->first();
    }
}