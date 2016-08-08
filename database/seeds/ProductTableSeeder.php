<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
	        'imagePath' => 'img/protein.png',
	        'productName' => 'Chocolate Protein Powder', 
	        'productDescription' => 'Chocolate flavoured mega-swole protein powder. Make your friends look puny with this product.', 
	        'productWeight' => '10kg', 
	        'stockAmount' => '3', 
	        'productPrice' => '45'
        ]);
        $product->save();
        
        $product = new \App\Product([
	        'imagePath' => 'img/protein.png',
	        'productName' => 'Strawberry Protein Powder', 
	        'productDescription' => 'Strawberry flavoured mega-swole protein powder. Make your friends look puny with this product.', 
	        'productWeight' => '10kg', 
	        'stockAmount' => '3', 
	        'productPrice' => '45'
        ]);
        $product->save();
        
        $product = new \App\Product([
	        'imagePath' => 'img/protein.png',
	        'productName' => 'Vanilla Protein Powder', 
	        'productDescription' => 'Vanilla flavoured mega-swole protein powder. Make your friends look puny with this product.', 
	        'productWeight' => '10kg', 
	        'stockAmount' => '3', 
	        'productPrice' => '45'
        ]);
        $product->save();
        
        $product = new \App\Product([
	        'imagePath' => 'img/protein.png',
	        'productName' => 'Banana Protein Powder', 
	        'productDescription' => 'Banana flavoured mega-swole protein powder. Make your friends look puny with this product.', 
	        'productWeight' => '10kg', 
	        'stockAmount' => '3', 
	        'productPrice' => '45'
        ]);
        $product->save();
    }
}
