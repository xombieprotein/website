<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Product;
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
		$products = Product::all();
		$orders = Auth::user()->orders;
		$orders->transform(function($order, $key){
			$order->cart = unserialize($order->cart);
			return $order;
		});
		return view('user.profile', compact('orders', 'products'));
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

		public function addProduct()
	{
		return view('product.add');
	}
	
	public function storeProduct($id)
	{
		
	}

	public function editProduct($id)
    {
    	$product = Product::find($id);
    	return View('product.edit', ['product' => $product]);
    }
    
    public function updateProduct(Request $request, Product $id)
    {
    	$id->update($request->all());
		return redirect()->action('PagesController@profile');
    }
    
    public function deleteProduct(Product $id)
	{
		Product::find($id)->delete();
		return Redirect()->action('PagesController@profile');
	}	
}