<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Product;
use App\Http\Requests;
use Auth;

class PagesController extends Controller
{
	// Loads the homepage
	public function home()
	{
		return view('welcome');
	}
	
	/**
	*	Retrieves all products from the product
	*	database for admin product management.
	*
	*	Retrieves user orders, unserializes the
	*	data, then returns it for Purchase History.
	*
	*	Loads profile of the logged in user with
	*	purchase orders and product catalog for admins
	*/
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
	/**
	*	Finds the id of the current logged in user from the 
	*	User table and passes the information stored in that 
	*	id to the edit page.
	*/
	
	public function editProfile($id)
    {
    	$user = User::find($id);
    	return view('user.edit', ['user' => $user]);
    }
    
	/**
	*	Takes the request from the Edit Profile page
	*	and passes the new information into the User Database.
	*	Redirects back to the user profile.
	*/
    public function updateProfile(Request $request, User $id) {
	    $id->update($request->all());
	    return redirect()->action('PagesController@profile');
    }
    
	// 	Finds and erases the logged in user id and returns to the homepage
	public function deleteProfile($id)
	{
		User::find($id)->delete();
		return view('welcome');
	}
	
	// 	Loads the Administrator Add Product page
		public function addProduct()
	{
		return view('product.add');
	}
	
	/**
	*	Moves the uploaded image to the img/ directory
	*	then creates a new product in the Products database.
	*	Once saved redirects to the profile page
	*/
	public function storeProduct()
	{	
		//get the image from the file
		$img = request()->imagePath;
		//this is the file path where images are stored in the public folder
		$filePath = 'img/';
		//get the file extension type of the image
		$fileExtension = request()->imagePath->getClientOriginalExtension();
		//name the image with the product name and a random number to ensure unique name
		$fileName = request()->imagePath->getClientOriginalName();
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
	
	/**
	*	Finds the id of the selected product from the 
	*	product management table and returns the edit product page
	*/
	public function editProduct($id)
    {
    	$product = Product::find($id);
    	return View('product.edit', ['product' => $product]);
    }
    
    /**
	*	Takes the request from the Edit Product page
	*	and passes the new information into the Product 
	*	Database.
	*	
	*	Redirects back to the user profile.
	*/
    public function updateProduct(Request $request, Product $id)
    {
    	$id->update($request->all());
		return redirect()->action('PagesController@profile');
    }
    
	/**
    *	Finds and erases the selected product from the 
	*	product table and returns to the Profile page
	*/
    public function deleteProduct($id) {
 		$product = Product::find($id);
 		$product->delete();
		return Redirect()->action('PagesController@profile');
	}	
}