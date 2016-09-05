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
    	<div class="row">
			<div class="col-sm-2 col-lg-2 col-lg-offset-1" id="profileNav">
				<!-- Nav tabs -->
				<ul class="nav nav-pills nav-stacked" role="tablist">
					<li role="presentation" class="active"><a href="#dashboard" aria-controls="dashboard" role="tab" data-toggle="pill">Account Information</a></li>
					<li role="presentation"><a href="#purchases" aria-controls="purchases" role="tab" data-toggle="pill">Purchase History</a></li>
				</ul>
			</div>
			<div class="col-sm-10 col-lg-8">
        	<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane fade in active" id="dashboard">
					<div class="col-sm-12">
						<div class="panel panel-default">
				        	<div class="panel-heading">
					        	<h3 class="lead text-center">Account Information</h3>
				        	</div>
				        	<div class="panel-body">
					        	<ul class="nav nav-pills">
							    	<li class="pull-right"><a href="{{ route('profile.edit', ['id' => Auth::user()->id]) }}">Edit</a></li>
						    	</ul>
						    	<h3 class="lead text-center">User Credentials</h3>
					        	<div class="row">
						        	<div class="col-md-4 text-right">
						        		<h4><small>NAME</small></h4>
						        	</div>
						        	<div class="col-md-6">
										<h4>{{ Auth::user()->name }}</h4>
									</div>
									<div class="col-md-4 text-right">
						        		<h4><small>EMAIL</small></h4>
						        	</div>
						        	<div class="col-md-6">
										<h4>{{ Auth::user()->email }}</h4>
									</div>
									<div class="col-md-4 text-right">
						        		<h4><small>PASSWORD</small></h4>
						        	</div>
						        	<div class="col-md-6">
										<h4><a href="{{ url('/password/reset') }}">Reset Your Password</a></h4>
									</div>
								</div>
					        	<hr>
					        	<h3 class="lead text-center">Shipping Details</h3>
					        	<div class="row">
						        	<div class="col-md-4 text-right">
						        		<h4><small>ADDRESS</small></h4>
						        	</div>
						        	<div class="col-md-6">
										<h4>{{ Auth::user()->address }}</h4>
									</div>
									<div class="col-md-4 text-right">
						        		<h4><small>SUBURB</small></h4>
						        	</div>
						        	<div class="col-md-6">
										<h4>{{ Auth::user()->city }}, {{ Auth::user()->state }}</h4>
									</div>
									<div class="col-md-4 text-right">
						        		<h4><small>POST CODE</small></h4>
						        	</div>
						        	<div class="col-md-6">
										<h4>{{ Auth::user()->postalcode }}</h4>
									</div>
								</div>
					        	<hr>
					        	<div class="row">
						        	<h3 class="lead text-center">Delete Account</h3>
						        	<p class="text-center col-md-6 col-md-offset-3" style="margin-bottom: 1.5em">
							        	Deleting your account will permanently remove your details and purchase history.
							        	You can register with the same email again in the future, but you will not recover
							        	your purchase history.
						        	</p>
						        	<div class="col-md-4 text-right"><h4><small >DELETE ACCOUNT</small></h4></div>
							        <div class="col-md-6">
								        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
								        	<i class="glyphicon glyphicon-trash"></i> Delete Account
								        </button>
								        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
									        <div class="modal-dialog" role="document">
										        <div class="modal-content">
											        <div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
														<h4 class="modal-title text-danger" id="deleteModalLabel">Attention!</h4>
													</div>
											        <div class="modal-body">
												        <p class="lead">
													        Just so we're all on the same page here, pressing the red Delete Account button will permanently erase
													        your account and your purchase history. Are you sure?
												        </p>
											        </div>
											        <div class="modal-footer">
												        <button type="button" class="btn btn-default" data-dismiss="modal">No! Take Me Back</button>
														<form method="POST" style="display: inline-block" action="/profile/delete/{{ Auth::user()->id}}">
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
				        	</div>
			        	</div>
			        	<a></a>
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
			</div>
			</div>
        </div>
    @endif
@endsection