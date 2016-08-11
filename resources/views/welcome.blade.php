@extends('layouts.layout')

@section('title')
	
		Xombie Protein
	
@endsection

@section('description')
		Xombie Protein
@endsection

@section('header')

	<div class="jumbotron" id="hero">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2 text-center">
					<h1 class="text-uppercase" id="hero-heading">Xombie Protein</h1>
					<h3 id="hero-body">
						This is where you put a stirring message
						about making massive gains and getting swole.
						Make a call to to action after this to get
						people to spend their money on your business.
					</h3>
					<a class="btn btn-success btn-lg" href="{{ url('shop') }}"><span class="glyphicon glyphicon-shopping-cart"></span> Shop Now</a>
				</div>
			</div>
		</div>
	</div>

@endsection
@section('content')
	<div class="row" id="hook">
		<div class="col-sm-8 col-sm-offset-2">
			<h1 class="text-center text-uppercase">Get the best protein for your goals</h1>
			<h3 class="text-center text-capitalize">Xombie Protein offers a range of protein supplements for all sorts of workout routines to help you achieve your maximum potential.</h3>
		</div>
	</div>
	<div class="row" id="promo">
		<h1 class="text-center text-uppercase" >Our Best Sellers from the store</h1>
		<div class="col-sm-6" id="xpImg-1">
			<h2 class="text-center">Chocolate</h2>
		</div>
		<div class="col-sm-6" id="xpImg-2">
			<h2 class="text-center">Banana</h2>
		</div>
	</div>
@endsection