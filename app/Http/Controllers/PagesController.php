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
		//get the image from the file
		$img = request()->imagePath;
		//this is the file path where images are stored in the public folder
		$filePath = 'img/';
		//get the file extension type of the image
		$fileExtension = request()->imagePath->getClientOriginalExtension();
		//name the image with the product name and a random number to ensure unique name
		$fileName = request()->productName.rand(1,99999).'.'.$fileExtension;
		//move the file to the public/img folder
		Request()->imagePath->move($filePath, $fileName);
		//update the database to find the newly uploaded image
		$product = new Product;
 		$product->imagePath = $filePath.$fileName;
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