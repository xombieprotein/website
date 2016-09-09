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
	
	public function storeProduct()
	{
		
		$product = new Product;
 		$product->imagePath = 'img/'.request()->imagePath; //this is really badly coded image injection. Assumes the file is already uploaded to public/img. Will fix this after initial testing today
		$product->productName = request()->productName;
		$product->productDescription = request()->productDescription;
		$product->stockAmount = request()->stockAmount;
		$product->price = request()->price;
		$product->productWeight = request()->productWeight;
		$product->save();
		return redirect()->action('PagesController@profile');
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
    
    public function deleteProduct($id) {
 		$product = Product::find($id);
 		$product->delete();
		return Redirect()->action('PagesController@profile');
	}	
}