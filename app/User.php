<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'created_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

     public function isAdmin(){
      if ($this->role == "admin") {
        return true;
      }
      return false;
    }

    public function getOrder(){
        return User::hasMany('App\Order', 'idUser', 'id');
    }

    public function getAllUser(){
        return User::where('role', 'user')->get();
    }

    public function getUserInfoById($userId){
        return User::where('id', $userId)->first();
    }

    public function deleteUser($userId){
        if($this->getUserInfoById($userId)->getOrder->count() > 0)
            return false;
        else
            User::destroy($userId);
        return true;
    }
}
