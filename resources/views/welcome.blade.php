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
				<div class="col-xs-8 col-sm-push-2 col-sm-3">
					<h1 class="text-uppercase">Xombie Protein</h1>
					<p class="lead">
						This is where you put a stirring message
						about making massive gains and getting swole.
						Make a call to to action after this to get
						people to spend their money on your business.
					</p>
					<p><a class="btn btn-success btn-lg" href="{{ url('shop') }}">Shop Now</a></p>
				</div>
			</div>
		</div>
	</div>

@endsection
@section('content')
<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
	<h1 class="text-center text-capitalize">Get ripped, get lean or get bulked.</h1>
	<h2 class="text-center"><small>Our No. 1 Sellers from the store.</small></h2>
	<hr>
	<div class="row text-center">
		<div class="col-sm-4 col-md-4">
			<img src="img/protein.png" class="img-responsive center-block">
			<h3>Chocolate</h3>
			<p><a class="btn btn-success" href="{{ url('shop') }}">Shop Now</a></p>
		</div>
		<div class="col-sm-4 col-md-4">
			<img src="img/protein.png" class="img-responsive center-block">
			<h3>Strawberry</h3>
			<p><a class="btn btn-success" href="{{ url('shop') }}">Shop Now</a></p>
		</div>
		<div class="col-sm-4 col-md-4">
			<img src="img/protein.png" class="img-responsive center-block">
			<h3>Banana</h3>
			<p><a class="btn btn-success" href="{{ url('shop') }}">Shop Now</a></p>
		</div>
	</div>
	<div class="panel panel-item" id="block">
		<div class="panel-heading">
			<h1>Why Choose Xombie?</h1>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-4">
							<img src="img/protein.png" class="img-responsive center-block">
						</div>
						<div class="col-sm-8">
							<h2>Better Energy Consumption</h2>
							<p class="lead">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<i>Mailchimp goes here</i>
@endsection