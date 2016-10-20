<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	// The fields of a Product that can be changed
    protected $fillable = [ 'imagePath', 'productName', 'productDescription', 'productWeight', 'stockAmount', 'price'];
}
