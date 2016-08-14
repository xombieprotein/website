@extends('layouts.layout')

@section('title')
		Shop Xombie Products
@endsection
@section('description')
		Xombie Protein web store
@endsection

@section('content')
	@if(Session::has('success'))
	<div class="row">
		<div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
			<div id="charge-message" class="alert alert-success fade in">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				{{ Session::get('success') }}
			</div>
		</div>
	</div>
	@endif
	<div class="row">
			    <div class="col-md-3 col-md-push-9 col-lg-3 col-lg-push-8">
				    <div class="panel panel-checkout">
					    <div class="panel-heading">
						    <h4 class="text-center">Shopping Cart</h4>
					    </div>
					    <ul class="list-group">
						    @if (Session::has('cart'))
							@foreach ($items as $item)
							<li class="list-group-item">
								{{ $item['qty'] }} x {{ $item['item']['productName'] }}
							</li>
							@endforeach
							<li class="list-group-item list-group-item-success">Total <span class="pull-right"><strong >${{ Session::get('cart')->totalPrice }}</strong></span></li>
							@endif
					    </ul>
					    <div class="panel-footer">
							<a href="{{ route('product.shoppingCart') }}" class="btn btn-success btn-block"><i class="glyphicon glyphicon-shopping-cart"></i> Checkout</a>
					    </div>
				    </div>
			    </div>
			    <div class="col-md-9 col-md-pull-3 col-lg-7 col-lg-pull-2">
				    <nav class="navbar navbar-inverse">
					    <div class="container-fluid">
							<ul class="nav navbar-nav navbar-right">
								<li><a><span class="glyphicon glyphicon glyphicon-th"></span> Grid</a></li>
								<li><a><span class="glyphicon glyphicon glyphicon-th-list"></span> List</a></li>
								<li class="dropdown">
								  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-sort"></span> Refine Search <span class="caret"></span></a>
								  <ul class="dropdown-menu">
								    <li><a href="#"><span class="glyphicon glyphicon-sort-by-attributes"></span> Price Lowest - Highest</a></li>
								    <li><a href="#"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span> Price Highest - Lowest</a></li>
								    <li><a href="#"><span class="glyphicon glyphicon-sort-by-alphabet"></span> Alphabetical A-Z</a></li>
								    <li><a href="#"><span class="glyphicon glyphicon-sort-by-alphabet-alt"></span> Price Highest - Lowest</a></li>
								  </ul>
								</li>
							</ul>
					    </div>
				    </nav>
				    @foreach ($products->chunk(3) as $productChunk)
			    	<div class="row">
			    		@foreach ($productChunk as $product)
				    		<div class="col-sm-4">
					    		<div class="panel panel-item">
									<img src="{{ $product->imagePath }}" class="img-responsive center-block">
						    		<h4 class="text-center">
							    		{{{ $product->productName }}}
						    		</h4>
						    		<div class="panel-body">
							    		<p id="productDescription">
									    	{{{ $product->productDescription }}}
								    	</p>
										<div class="clearfix" id="priceLabel">
											<div class="label label-success pull-right">Unit Price: ${{ $product->price }}</div>
										</div>
								    	<div class="clearfix">
									    	<a class="btn btn-success pull-right" id="cartBtn" href="{{ route('product.addToCart', ['id' => $product->id]) }}"><span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart</a>
								    	</div>
						    		</div>
					    		</div>
				    		</div>
			    		@endforeach
			    	</div>
			    	@endforeach
		    	</div>
	    	</div>
	
@endsection