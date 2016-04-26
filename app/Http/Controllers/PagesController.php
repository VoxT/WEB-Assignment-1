<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Admin;

class PagesController extends Controller
{
	public function about() {
		return view('page/about');
	}
    public function contact() {
    	$user = new Admin;
    	//$user->insert('votienthieu@gmail.com', '123456', 'Vo Tien Thieu');
    	$allUser = $user->selectAll();
    	return view('page.contact')->with('admin', $allUser);
    }
   
}
