@extends('layout')

@section('title')
	
		Shop Xombie
	
@endsection

@section('content')
	
	<div class="row">
			    <div class="col-sm-4 col-sm-push-8">
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
			    <div class="col-sm-8 col-sm-pull-4">
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
			    	<div class="row">
			    		<div class="col-sm-4 col-md-4">
				    		<div class="panel panel-item">
								<img src="img/protein.png" class="img-responsive center-block">
								<hr>
					    		<h4 class="text-center">Mega Bucket</h4>
					    		<div class="panel-body">
						    		<p class="lead">
								    	Product Description Goes Here
							    	</p>
						    		<p class="text-right">
							    		<a class="btn btn-success" id="cartBtn" href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart</a>
						    		</p>
					    		</div>
				    		</div>
			    		</div>
			    		<div class="col-sm-4 col-md-4">
				    		<div class="panel panel-item">
								<img src="img/protein.png" class="img-responsive center-block">
								<hr>
					    		<h4 class="text-center">Mega Bucket</h4>
					    		<div class="panel-body">
						    		<p class="lead">
								    	Product Description Goes Here
							    	</p>
						    		<p class="text-right">
							    		<a class="btn btn-success" id="cartBtn" href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart</a>
						    		</p>
					    		</div>
				    		</div>
			    		</div>
			    		<div class="col-sm-4 col-md-4">
				    		<div class="panel panel-item">
								<img src="img/protein.png" class="img-responsive center-block">
								<hr>
								<h4 class="text-center">Mega Bucket</h4>
					    		<div class="panel-body">
						    		<p class="lead">
								    	Product Description Goes Here
							    	</p>
						    		<p class="text-right">
							    		<a class="btn btn-success" id="cartBtn" href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart</a>
						    		</p>
					    		</div>
				    		</div>
			    		</div>
			    		<div class="col-sm-4 col-md-4">
				    		<div class="panel panel-item">
								<img src="img/protein.png" class="img-responsive center-block">
								<hr>
					    		<h4 class="text-center">Mega Bucket</h4>
					    		<div class="panel-body">
						    		<p class="lead">
								    	Product Description Goes Here
							    	</p>
						    		<p class="text-right">
							    		<a class="btn btn-success" id="cartBtn" href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart</a>
						    		</p>
					    		</div>
				    		</div>
			    		</div>
			    		<div class="col-sm-4 col-md-4">
				    		<div class="panel panel-item">
								<img src="img/protein.png" class="img-responsive center-block">
								<hr>
					    		<h4 class="text-center">Mega Bucket</h4>
					    		<div class="panel-body">
						    		<p class="lead">
								    	Product Description Goes Here
							    	</p>
						    		<p class="text-right">
							    		<a class="btn btn-success" id="cartBtn" href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart</a>
						    		</p>
					    		</div>
				    		</div>
			    		</div>
			    		<div class="col-sm-4 col-md-4">
				    		<div class="panel panel-item">
								<img src="img/protein.png" class="img-responsive center-block">
								<hr>
					    		<h4 class="text-center">Mega Bucket</h4>
					    		<div class="panel-body">
						    		<p class="lead">
								    	Product Description Goes Here
							    	</p>
						    		<p class="text-right">
							    		<a class="btn btn-success" id="cartBtn" href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart</a>
						    		</p>
					    		</div>
				    		</div>
			    		</div>
			    	</div>
			    	<div class="row">
				    	<div class="col-sm-12">
					    	<div class="panel panel-item">
						    	<div class="panel-body">
							    	<div class="row">
								    	<div class="col-xs-4">
									    	<img src="img/protein.png" class="img-responsive center-block">
								    	</div>
								    	<div class="col-xs-8">
									    	<h4>Mega Bucket</h4>
									    	<p class="lead">
										    	Product Description Goes Here
									    	</p>
									    	<p class="text-left">
									    		<a class="btn btn-success" id="cartBtn" href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart</a>
								    		</p>
								    	</div>
							    	</div>
						    	</div>
					    	</div>
				    	</div>
			    	</div>
		    	</div>
	    	</div>
	
@endsection