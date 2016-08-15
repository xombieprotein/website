<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests;
use Auth;

class PagesController extends Controller
{
	public function home()
	{
		return view('welcome');
	}
	public function profile()
	{
		$orders = Auth::user()->orders;
		$orders->transform(function($order, $key){
			$order->cart = unserialize($order->cart);
			return $order;
		});
		return view('user.profile', compact('orders'));
	}
	public function editProfile($id)
    {
    	$user = User::find($id);
    	return view('user.edit', ['user' => $user]);
    }
    
    public function updateProfile(Request $request, User $id) {
	    $id->update($request->all());
	    return redirect()->action('PagesController@profile');
    }
	
	public function deleteProfile($id)
	{
		User::find($id)->delete();
		return view('welcome');
	}
	
}