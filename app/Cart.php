<?php
namespace App;
class Cart
{
    // Start the session with nothing in the cart and declare variables
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;
    
    // Constructs the shopping cart and saves items to $oldCart variable to be used by ProductController
    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }
    
    // Updates the total quantity and price when there is more than 1 of the same item in the cart
    public function add($item, $id) {
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
    }
    
    // Reduces the quantity and price of an item from the cart. 
	// Updates total price with the cost of removed item.
    public function reduceItem($id)
    {
    	$this->items[$id]['qty']--;
    	$this->items[$id]['price'] -= $this->items[$id]['item']['price'];
    	$this->totalQty--;
    	$this->totalPrice -= $this->items[$id]['item']['price'];
    	
    	if($this->items[$id]['qty'] <= 0) {
	    	unset($this->items[$id]);
    	}
    }
    
    // Removes selected item from the cart and updates the price to match
    public function removeItem($id) {
	    $this->totalQty -= $this->items[$id]['qty'];
    	$this->totalPrice -= $this->items[$id]['price'];
	    unset($this->items[$id]);
    }
    
    // Increases the quantity and price of an item already in the cart. 
	// Updates total price with the cost of newly added item.
    public function addItem($id) {
	    $this->items[$id]['qty']++;
    	$this->items[$id]['price'] += $this->items[$id]['item']['price'];
	    $this->totalQty++;
	    $this->totalPrice += $this->items[$id]['item']['price'];
    }
}