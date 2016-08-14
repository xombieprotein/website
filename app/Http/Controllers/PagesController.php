<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class PagesController extends Controller
{
	public function home()
	{
		return view('welcome');
	}
	
	public function about()
	{
		return view('about');
	}
	
	public function profile()
	{
		$orders = Auth::user()->orders;
		$orders->transform(function($order, $key){
			$order->cart = unserialize($order->cart);
			return $order;
		});
		return view('user.profile', ['orders' => $orders]);
	}
}