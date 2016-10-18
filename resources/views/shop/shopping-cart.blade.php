@extends('layouts.layout')

@section('title')
		Shopping Cart
@endsection
@section('description')
		Shopping Cart checkout page
@endsection

@section('content')
	@if (Auth::guest())
		@if(Session::has('cart'))
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
					<div class="alert alert-warning alert-dismissible text-center" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<p><strong>Hey there!</strong> You're not logged in.</p>
						<p>You can <em>Log In</em> or <em>Register</em> from the menu <br> above to save this cart to your purchase history.</p>
						<p>You can continue without logging in to simply <br> purchase this cart. We respect your privacy.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4>Shopping Cart</h4>
						</div>
						<div class="panel-body">
							<p class="text-center">
								Take the time to review your shopping cart before checking out.
							</p>
						</div>
						<table class="table table-hover">
							<thead> 
								<tr>
									<th>Item</th> <th >Quantity</th> <th >Price</th> <th>Actions</th>
								</tr> 
							</thead> 
							<tbody>
								@foreach ($products as $product)
									<tr>
									<td >
										<strong>{{{ $product['item']['productName'] }}}</strong>
									</td>
									<td>
										{{ $product['qty'] }}
									</td>
									<td>
										$ {{ $product['price'] }}
									</td>
									<td>
										<div class="btn-group">
											<a href="{{ route('product.reduce', ['id' => $product['item']['id']]) }}" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-minus"></i></a>
											<a href="{{ route('product.remove', ['id' => $product['item']['id']]) }}" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
											<a href="{{ route('product.add', ['id' => $product['item']['id']]) }}" type="button" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-plus"></i></a>
										</div>
									</td>
									</tr>
								@endforeach
									<tfoot>
										<tr>
											<td></td>
											<td><strong>Total:</strong></td>
											<td>$ {{ $totalPrice }}</td>
											<td><a href="{{ route('checkout') }}" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-shopping-cart"></i> Checkout</a></td>
										</tr>
									</tfoot>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		@else
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
					<div class="panel panel-default">
						<div class="panel-body">
							<span id="emptyCartIcon"><i class="glyphicon glyphicon-shopping-cart text-center"></i></span>
							<h1 class="text-center" id="emptyCart">
								No Items in Cart
							</h1>
							<p class="lead text-center" id="emptyCart">
								Add some items to your cart first.
							</p>
							<div class="text-center">
								<a class="btn btn-success btn-lg text-center" href="{{ url('shop') }}"><span class="glyphicon glyphicon-shopping-cart"></span> Shop Now</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		@endif
	@else
		@if(Session::has('cart'))
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4>Shopping Cart</h4>
						</div>
						<div class="panel-body">
							<p class="text-center">
								Take the time to review your shopping cart before checking out
							</p>
						</div>
						<table class="table table-hover">
							<thead> 
								<tr>
									<th>Item</th> <th >Quantity</th> <th >Price</th> <th>Actions</th>
								</tr> 
							</thead> 
							<tbody>
								@foreach ($products as $product)
									<tr>
									<td >
										<strong>{{{ $product['item']['productName'] }}}</strong>
									</td>
									<td>
										{{ $product['qty'] }}
									</td>
									<td>
										$ {{ $product['price'] }}
									</td>
									<td>
										<div class="btn-group">
											<a href="{{ route('product.reduce', ['id' => $product['item']['id']]) }}" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-minus"></i></a>
											<a href="{{ route('product.remove', ['id' => $product['item']['id']]) }}" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
											<a href="{{ route('product.add', ['id' => $product['item']['id']]) }}" type="button" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-plus"></i></a>
										</div>
									</td>
									</tr>
								@endforeach
									<tfoot>
										<tr>
											<td></td>
											<td><strong>Total:</strong></td>
											<td>$ {{ $totalPrice }}</td>
											<td><a href="{{ route('checkout') }}" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-shopping-cart"></i> Checkout</a></td>
										</tr>
									</tfoot>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		@else
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
					<div class="panel panel-default">
						<div class="panel-body">
							<span id="emptyCartIcon"><i class="glyphicon glyphicon-shopping-cart text-center"></i></span>
							<h1 class="text-center" id="emptyCart">
								No Items in Cart
							</h1>
							<p class="lead text-center" id="emptyCart">
								Add some items to your cart first.
							</p>
							<div class="text-center">
								<a class="btn btn-success btn-lg text-center" href="{{ url('shop') }}"><span class="glyphicon glyphicon-shopping-cart"></span> Shop Now</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		@endif
	@endif
@endsection