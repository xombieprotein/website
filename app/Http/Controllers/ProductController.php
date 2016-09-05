<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\Order;
use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use Auth;
use Stripe\Charge;
use Stripe\Stripe;

class ProductController extends Controller
{
    public function getIndex()
    {
	    $products = Product::all();
	    if(Session::has('cart')){
			$oldCart =  Session::get('cart');
	    	$cart = new Cart($oldCart);
	    	return view('shop.index', ['products' => $products, 'items' => $cart->items, 'totalPrice' => $cart->totalPrice]);
	    } else {
		    return view('shop.index', ['products' => $products]);
	    }
    }
    public function getAddToCart(Request $request, $id)
    {
    	$product = Product::find($id);
    	$oldCart = Session::has('cart') ? Session:: get('cart') : null;
    	$cart = new Cart($oldCart);
    	$cart->add($product, $product->id);
    	
    	$request->session()->put('cart', $cart);
    	return redirect()->action('ProductController@getIndex');
    }
    public function showItem($id)
    {
    	$product = Product::find($id);
    	return view('shop.show', ['product' => $product]);
    }
    public function getReduceItem($id)
    {
    	$oldCart = Session::has('cart') ? Session:: get('cart') : null;
    	$cart = new Cart($oldCart);
    	$cart->reduceItem($id);
    	
    	if(count($cart->items) > 0) {
	    	Session::put('cart', $cart);
    	} else {
	    	Session::forget('cart');
    	}
    	return redirect()->route('product.shoppingCart');
    }
    
    public function getRemoveItem($id)
    {
    	$oldCart = Session::has('cart') ? Session:: get('cart') : null;
    	$cart = new Cart($oldCart);
    	$cart->removeItem($id);
    	
    	if(count($cart->items) > 0) {
	    	Session::put('cart', $cart);
    	} else {
	    	Session::forget('cart');
    	}
    
    	return redirect()->route('product.shoppingCart');
    }
    
    public function getAddItem($id)
    {
    	$oldCart = Session::has('cart') ? Session:: get('cart') : null;
    	$cart = new Cart($oldCart);
    	$cart->addItem($id);
    	
    	Session::put('cart', $cart);
    	return redirect()->route('product.shoppingCart');
    }
    
    public function getCart()
    {
	    // If the cart is empty, return the shopping cart view as empty
    	if (!Session::has('cart')) {
	    	return view('shop.shopping-cart');
	    }
	    $oldCart = Session::get('cart');
	    $cart = new Cart($oldCart);
	    return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }
    public function getCheckout()
    {
		if (!Session::has('cart')) {
	    	return view('shop.shopping-cart');
	    }
	    $oldCart = Session::get('cart');
	    $cart = new Cart($oldCart);
	    $total = $cart->totalPrice;
	    return view('shop.checkout', ['total' => $total]);
    }
    
    public function postCheckout(Request $request)
    {
    	if (!Session::has('cart')) {
	    	return redirect()->route('product.shoppingCart');
	    }
	    $oldCart = Session::get('cart');
	    $cart = new Cart($oldCart);
	    
	    Stripe::setApiKey('sk_test_t1jp6t2z4QhEAwucCtDVKH6N');
	    try {
			    $charge = Charge::create(array(
				"amount" => $cart->totalPrice * 100,
				"currency" => "aud",
				"source" => $request->input('stripeToken'), // obtained with Stripe.js
				"description" => "Test Charge"
			));
			$order = new Order();
			$order->cart = serialize($cart);
			$order->address = $request->input('address');
			$order->name = $request->input('name');
			$order->payment_id = $charge->id;
			
			Auth::user()->orders()->save($order);
			
	    } catch (\Exception $e) {
		    return redirect()->route('checkout')->with('error', $e->getMessage());
	    }
	    
	    Session::forget('cart');
	    return redirect()->route('product.index')->with('success', 'Successfully purchased products!');
    }
}