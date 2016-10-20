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
	/**
	*	Retrieve all products from Product database
	*	Check to see if the session already has a cart with items.
	*	If there is a cart, move the old cart items to a new cart.
	*	Return the shop page with the shopping cart items in view.
	*	If there is no cart, simply return the shop page.
	*/
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
    
    /**
	*	Find the requested Product ID
	*	Check to see if the session already has a cart with items.
	*	If there are already cart items, retrieve them then move them to a new cart.
	*	Put the new items into the cart and save the session.
	*	Redirect user to the shop page.
	*/
    public function getAddToCart(Request $request, $id)
    {
    	$product = Product::find($id);
    	$oldCart = Session::has('cart') ? Session:: get('cart') : null;
    	$cart = new Cart($oldCart);
    	$cart->add($product, $product->id);
    	
    	$request->session()->put('cart', $cart);
    	return redirect()->action('ProductController@getIndex');
    }
    
    // This function displays product information when you click on More Info in the shop view
    public function showItem($id)
    {
    	$product = Product::find($id);
    	return view('shop.show', ['product' => $product]);
    }
    
	/**
	*	Reduces the quantity of a selected product by 1 when clicking the '-' button on the review cart page
	*	If the number of items in the cart reduces to 0, then the cart is forgotten by the session as it is empty
	*/ 
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
    
    /**
	*	Removes the selected product when clicking the trash can/delete button on the review cart page
	*	If the number of items in the cart reduces to 0, then the cart is forgotten by the session as it is empty
	*/
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
    /**
	*	Increases the quantity of a selected product by 1 when clicking the '+' button on the review cart page
	*	Puts the additional product in the cart
	*/ 
    public function getAddItem($id)
    {
    	$oldCart = Session::has('cart') ? Session:: get('cart') : null;
    	$cart = new Cart($oldCart);
    	$cart->addItem($id);
    	
    	Session::put('cart', $cart);
    	return redirect()->route('product.shoppingCart');
    }
    
	/**
	*	If the cart is empty, return the shopping cart view as empty
	*	Otherwise, retrieve all cart items and return the review cart page
	*/
    public function getCart()
    {
    	if (!Session::has('cart')) {
	    	return view('shop.shopping-cart');
	    }
	    $oldCart = Session::get('cart');
	    $cart = new Cart($oldCart);
	    return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }
    
    /**
	*	If the session has no cart, and a user tries to manually visit the checkout page
	*	redirect the user back to the empty cart view.
	*	Otherwise, take the cart items, and the total price of those items and pass the
	*	information through to the checkout page.
	*/
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
    
	/**
	*	Tries to processes the payment through Stripe API
	*	If the payment is successful, save the cart items
	*	as a new order, then serialize that order, adds the
	*	name, address and payment id to the order, then saves
	*	the order to the user.
	*	
	*	If there are errors the user is redirected back to the checkout page
	*	
	*	If payment succeeds, the session clears the cart and returns to the 
	*	shop page with a success message
	*/
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
				"amount" => $cart->totalPrice * 100, //price calculated in cents, so x100 to get dollars
				"currency" => "aud",
				"source" => $request->input('stripeToken'), // obtained with Stripe.js
				"description" => "Test Charge"
			));
			$order = new Order();
			$order->cart = serialize($cart);
			$order->address = $request->input('address');
			$order->name = $request->input('name');
			$order->payment_id = $charge->id;
			if(Auth::user()) {
				Auth::user()->orders()->save($order);
			}
			
	    } catch (\Exception $e) {
		    return redirect()->route('checkout')->with('error', $e->getMessage());
	    }
	    
	    Session::forget('cart');
	    return redirect()->route('product.index')->with('success', 'Successfully purchased products!');
    }
}