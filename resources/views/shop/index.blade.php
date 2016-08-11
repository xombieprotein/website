@extends('layouts.layout')

@section('title')
		Shop Xombie Products
@endsection
@section('description')
		Xombie Protein web store
@endsection

@section('content')
	
	<div class="row">
			    <div class="col-md-3 col-md-push-9 col-lg-2 col-lg-push-8">
				    <div class="panel panel-checkout">
					    <div class="panel-heading">
						    <h4 class="text-center">Shopping Cart</h4>
					    </div>
					    <ul class="list-group">
						    <li class="list-group-item">Mega Bucket <span class="badge">$40</span></li>
						    <li class="list-group-item">Mega Bucket <span class="badge">$40</span></li>
						    <li class="list-group-item">Mega Bucket <span class="badge">$40</span></li>
						    <li class="list-group-item">Mega Bucket <span class="badge">$40</span></li>
						    <li class="list-group-item list-group-item-success">Total <span class="badge">$160</span></li>
					    </ul>
					    <div class="panel-footer">
							<button type="button" class="btn btn-success btn-block"><i class="glyphicon glyphicon-shopping-cart"></i> Checkout</button>
					    </div>
				    </div>
			    </div>
			    <div class="col-md-9 col-md-pull-3 col-lg-7 col-lg-pull-1">
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
				    		<div class="col-sm-4 col-md-4">
					    		<div class="panel panel-item">
									<img src="{{ $product->imagePath }}" class="img-responsive center-block">
						    		<h4 class="text-center">
							    		{{{ $product->productName }}}
						    		</h4>
						    		<div class="panel-body">
							    		<p class="lead" id="productDescription">
									    	{{{ $product->productDescription }}}
								    	</p>
								    	<div class="clearfix">
									    	<a class="btn btn-default"><strong>${{ $product->productPrice }}</strong></a>
									    	<a class="btn btn-success pull-right" id="cartBtn" href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart</a>
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