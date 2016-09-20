@extends('layouts.layout')

@section('title')
		{{ $product->productName }}
@endsection
@section('description')
		Xombie Protein web store
@endsection

@section('content')
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
			<h5><a href="{{ url('shop') }}" id="backButton"><i class="glyphicon glyphicon-triangle-left"></i> Back to Shop</a></h5>
			<div class="panel panel-item">
				<div class="row">
					<div class="col-sm-4">
						<img src="/{{ $product->imagePath }}" alt="Bag of {{ $product->productName }} protein powder" class="img-responsive">
					</div>
					<div class="col-sm-8">
						<div class="panel-body">
							<h2 class="media-heading clearfix">
								{{ $product->productName }}
								<div class="pull-right" id="xp-price">${{ $product->price }}</div>
							</h2>
							<p class="lead">
								{{ $product->productDescription }}
							</p>
							<h3>
								Nutritional Information
							</h3>
							<p class="lead">Weight: {{ $product->productWeight }}</p>
							<p class="lead">Additional Nutritional information to go here once provided</p>
							<a class="btn btn-success" id="cartBtn" href="{{ route('product.addToCart', ['id' => $product->id]) }}">
								<span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection