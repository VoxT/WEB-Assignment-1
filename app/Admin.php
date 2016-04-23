<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Admin;

use DB;

class Admin extends Model
{
	/**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false; 
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'admin';
    protected $primaryKey = 'idAdmin';

    /**
     * [insert description]
     * @param  [type] $username [description]
     * @param  [type] $password [description]
     * @param  [type] $name     [description]
     * @return [type]           [description]
     */
    public function insert($username, $password, $name) {
    	DB::table('admin')->insert(
    		['idAdmin' => '2', 'userName' => $username, 'password' => $password, 'ten' => $name]
    	);
    }

    public function selectAll() {
    	$data = Admin::all(); //DB::table('admin')->select('ten')->get();
    	return $data; 
    }
}
