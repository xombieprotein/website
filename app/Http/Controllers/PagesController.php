<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
	public function home()
	{
		$people = ['Alex', 'Clinton', 'Kenny', 'Matt', 'Sophie'];
    
		return view('welcome', compact('people'));
	}
	
	public function about()
	{
		return view('about');
	}
	
	public function shop()
	{
		
		return view('shop');
	}
}