@extends('layouts.layout')

@section('title')
		Checkout
@endsection
@section('description')
		Shopping Cart checkout page
@endsection

@section('content')
	<div class="row">
		<div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="text-center text-uppercase">Checkout</h2>
				</div>
				<div class="panel-body">
					@if (Auth::guest())
						<h4>Your Total: ${{ $total }}</h4>
					<div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : ''  }}" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
		                {{ Session::get('error') }}
		            </div>
					<form action="{{ route('checkout') }}" method="post" id="checkout-form" autocomplete="on">
						<div class="row">
		                    <div class="col-xs-12">
		                        <div class="form-group">
		                            <label for="name">Name</label>
		                            <input type="text" id="name" class="form-control" required name="name" placeholder="John Doe">
		                        </div>
		                    </div>
		                    <div class="col-xs-12">
		                        <div class="form-group">
		                            <label for="address">Address</label>
		                            <input type="text" id="address" class="form-control" required name="address" autocomplete="street-address" placeholder="Shipping Address">
		                        </div>
		                    </div>
		                    <hr>
		                    <div class="col-xs-12">
		                        <div class="form-group">
		                            <label for="card-name">Card Holder Name</label>
		                            <input type="text" id="card-name" class="form-control" required>
		                        </div>
		                    </div>
		                    <div class="col-xs-12">
		                        <div class="form-group">
		                            <label for="card-number">Credit Card Number</label>
		                            <input type="text" id="card-number" class="form-control" required>
		                        </div>
		                    </div>
		                    <div class="col-xs-12">
		                        <div class="row">
		                            <div class="col-xs-6 col-sm4">
		                                <div class="form-group">
		                                    <label for="card-expiry-month">Expiration Month</label>
		                                    <input type="text" id="card-expiry-month" class="form-control" required>
		                                </div>
		                            </div>
		                            <div class="col-xs-6">
		                                <div class="form-group">
		                                    <label for="card-expiry-year">Expiration Year</label>
		                                    <input type="text" id="card-expiry-year" class="form-control" required>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                    <div class="col-xs-12">
		                        <div class="form-group">
		                            <label for="card-cvc">CVC</label>
		                            <input type="text" id="card-cvc" class="form-control" required>
		                        </div>
		                    </div>
		                </div>
		                {{ csrf_field() }}
		                <div class="panel-body"><button type="submit" class="btn btn-success btn-block btn-lg"><strong>Buy now</strong></button></div>
					</form>
					@else
					<h4>Your Total: ${{ $total }}</h4>
					<div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : ''  }}" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
		                {{ Session::get('error') }}
		            </div>
					<form action="{{ route('checkout') }}" method="post" id="checkout-form" autocomplete="on">
						<div class="row">
		                    <div class="col-xs-12">
		                        <div class="form-group">
		                            <label for="name">Name</label>
		                            <input type="text" id="name" class="form-control" required name="name" value="{{ Auth::user()->name }}">
		                        </div>
		                    </div>
		                    <div class="col-xs-12">
		                        <div class="form-group">
		                            <label for="address">Address</label>
		                            <input type="text" id="address" class="form-control" required name="address" autocomplete="street-address" value="{{ Auth::user()->address }}, {{ Auth::user()->city }}, {{ Auth::user()->state }}, {{ Auth::user()->postalcode }}">
		                        </div>
		                    </div>
		                    <hr>
		                    <div class="col-xs-12">
		                        <div class="form-group">
		                            <label for="card-name">Card Holder Name</label>
		                            <input type="text" id="card-name" class="form-control" required>
		                        </div>
		                    </div>
		                    <div class="col-xs-12">
		                        <div class="form-group">
		                            <label for="card-number">Credit Card Number</label>
		                            <input type="text" id="card-number" class="form-control" required>
		                        </div>
		                    </div>
		                    <div class="col-xs-12">
		                        <div class="row">
		                            <div class="col-xs-6 col-sm4">
		                                <div class="form-group">
		                                    <label for="card-expiry-month">Expiration Month</label>
		                                    <input type="text" id="card-expiry-month" class="form-control" required>
		                                </div>
		                            </div>
		                            <div class="col-xs-6">
		                                <div class="form-group">
		                                    <label for="card-expiry-year">Expiration Year</label>
		                                    <input type="text" id="card-expiry-year" class="form-control" required>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                    <div class="col-xs-12">
		                        <div class="form-group">
		                            <label for="card-cvc">CVC</label>
		                            <input type="text" id="card-cvc" class="form-control" required>
		                        </div>
		                    </div>
		                </div>
		                {{ csrf_field() }}
		                <div class="panel-body"><button type="submit" class="btn btn-success btn-block btn-lg"><strong>Buy now</strong></button></div>
					</form>
					@endif
				</div>
			</div>
			<div id="cancellation">
				<h4 class="small text-center">Cancellation Policy:</h4>
				<p class="text-center">
					<small>
						Xombie Protein accepts cancellations for orders 7 days after purchase. 
						To cancel an order, please email the team with your name, purchase item 
						and confirmation number received within your order confirmation email, 
						and we will reply within 24 hours. Customer’s are required to ship the 
						unwanted item for return to our main office at the customer’s expense. 
						Items must be unopened and returned in original packaging. If you would 
						like a different item instead of a refund, please state within the email. 
						Refunds will be transferred once cleared, and should be received within 3-5 
						working days. We only provide refunds via bank transfer, no mailed cheques 
						or cash is available.
					</small>
				</p>
			</div>
		</div>
	</div>
@endsection
@section('scripts')
	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
	<script type="text/javascript" src="{{ URL::to('js/checkout.js') }}"></script>
@endsection