@extends('layouts.layout')

@section('title')
	Shop Xombie Products
@endsection
@section('description')
	Xombie Protein web store
@endsection

@section('content')
	@if (Auth::guest())
        <div class="row">
        	<div class="col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
	        	<div class="panel panel-default">
		        	<div class="panel-heading text-center">Login Or Register First</div>
		        	<div class="panel-body">
			        	<p class="text-center lead">
				        	It looks like you're not logged in
			        	</p>
			        	<p class="text-center">
				        	In order to see your account details either log in to your
				        	account, or register a new account if you haven't done so already.
			        	</p>
			        	<p class="text-center">
				        	Choose an option below.
			        	</p>
		        	</div>
		        	<div class="panel-footer">
			        	<div class="clearfix">
				        	<div class="pull-right">
				        	<a href="{{ url('/login') }}" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> <strong>Log In</strong></a>
				        	<a href="{{ url('/register') }}" class="btn btn-success"><span class="glyphicon glyphicon-user"></span> <strong>Register</strong></a>
				        	</div>
			        	</div>
		        	</div>
	        	</div>
        	</div>
        </div>
    @else
    	<nav class="nav nav-tabs">
	    	<a href="{{ route('profile.edit', ['id' => Auth::user()->id]) }}">Edit</a>
    	</nav>
    	<div class="row">
			<div class="col-sm-2 col-lg-2 col-lg-offset-1" id="profileNav">
				<!-- Nav tabs -->
				<ul class="nav nav-pills nav-stacked" role="tablist">
					<li role="presentation" class="active"><a href="#dashboard" aria-controls="dashboard" role="tab" data-toggle="pill">Dashboard</a></li>
					<li role="presentation"><a href="#purchases" aria-controls="purchases" role="tab" data-toggle="pill">Purchases</a></li>
					<li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="pill">Settings</a></li>
				</ul>
			</div>
			<div class="col-sm-10 col-lg-8">
        	<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane fade in active" id="dashboard">
					<div class="col-sm-6">
						<div class="panel panel-default">
				        	<div class="panel-heading">
					        	<h3 class="lead">Personal Information</h3>
				        	</div>
				        	<div class="panel-body">
					        	<h4><small>NAME</small> {{ Auth::user()->name }}</h4>
					        	<h4><small>EMAIL</small> {{ Auth::user()->email }}</h4>
					        	<h4><small>ADDRESS</small> {{ Auth::user()->email }}</h4>
				        	</div>
			        	</div>
			        	<a></a>
		        	</div>
		        	<div class="col-sm-6">
			        	<div class="panel panel-default">
				        	<div class="panel-heading">
					        	<h3 class="lead">Shipping Information</h3>
				        	</div>
				        	<div class="panel-body">
					        	<h4><small>ADDRESS</small> {{ Auth::user()->address }}</h4>
					        	<h4><small>SUBURB</small> {{ Auth::user()->city }}, {{ Auth::user()->state }}</h4>
					        	<h4><small>POST CODE</small> {{ Auth::user()->postalcode }}</h4>
				        	</div>
			        	</div>
		        	</div>
		        	<div class="col-sm-6">
			        	<div class="panel panel-default">
				        	<div class="panel-heading">
					        	<h3 class="lead">Payment Information</h3>
				        	</div>
				        	<div class="panel-body">
					        	<p class="lead"></p>
				        	</div>
			        	</div>
		        	</div>
		        	<div class="col-sm-6">
			        	<div class="panel panel-default">
				        	<div class="panel-heading">
					        	<h3 class="lead">My Orders</h3>
				        	</div>
				        	<div class="panel-body">
					        	<h4><small>NAME</small> {{ Auth::user()->name }}</h4>
					        	<h4><small>EMAIL</small> {{ Auth::user()->email }}</h4>
					        	<h4><small>ADDRESS</small> {{ Auth::user()->email }}</h4>
				        	</div>
			        	</div>
		        	</div>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="purchases">
					<div class="panel panel-default">
		        	<div class="panel-heading">
			        	<h3 class="lead">Purchase History</h3>
		        	</div>
		        	<div class="panel-body">
			        	<p>Below is a list of all your purchases.</p>
		        	</div>
		        	<table class="table table-striped table-hover">
			        	<thead>
				        	<tr>
					        	<th>Purchase ID</th>
					        	<th>Purchase Item/s</th>
					        	<th>Item Quantity</th>
					        	<th>Item Price</th>
					        	<th>Total Price</th>
				        	</tr>
			        	</thead>
			        	<tbody>
				        	@foreach($orders as $order)
					        	<tr id="orders">
						        	<th>{{ $order->id }}</th>
						        	<td>
							        	<ul id="itemName">
						        		@foreach($order->cart->items as $item)
											<li>{{ $item['item']['productName'] }}</li>
							        	@endforeach
							        	</ul>
						        	</td>
						        	<td>
							        	<ul id="itemQty">
						        		@foreach($order->cart->items as $item)
											<li>{{ $item['qty'] }}</li>
							        	@endforeach
							        	</ul>
						        	</td>
						        	<td>
							        	<ul id="itemPrice">
						        		@foreach($order->cart->items as $item)
											<li>${{ $item['price'] }}</li>
							        	@endforeach
							        	</ul>
						        	</td>
						        	<td>${{ $order->cart->totalPrice }}</td>
					        	</tr>
				        	@endforeach
			        	</tbody>
		        	</table>
	        	</div>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="settings">
					<div class="panel panel-default">
						<div class="panel-body">
							<form method="POST" action="/profile/delete/{{ Auth::user()->id}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE" />
                            <button type="submit" class="btn btn-danger">
                                <i class="glyphicon glyphicon-trash"></i> Delete Account
                            </button>
                        </form>
						</div>
					</div>
				</div>
			</div>
			</div>
        </div>
    @endif
@endsection