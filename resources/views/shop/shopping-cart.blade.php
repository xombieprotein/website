@extends('layouts.layout')

@section('title')
		Shopping Cart
@endsection
@section('description')
		Shopping Cart checkout page
@endsection

@section('content')
	@if(Session::has('cart'))
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
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
										<button type="button" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
										<button type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></button>
										<button type="button" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
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
			<div class="col-sm-8 col-sm-offset-2">
				<div class="panel panel-default">
					<div class="panel-body">
						<p class="lead">
							No Items in Cart
						</p>
					</div>
				</div>
			</div>
		</div>
	@endif
@endsection