<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	// Allows users to have orders
    public function user() {
	    return $this->belongsTo('App\User');
    }
}
