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
        	<div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
	        	<div class="panel panel-default">
		        	<div class="panel-heading lead text-center">Login Or Register First</div>
		        	<div class="panel-body">
			        	<p>
				        	In order to see your account details either log in to your
				        	account, or register a new account to get started.
			        	</p>
		        	</div>
		        	<div class="panel-footer">
			        	<div class="clearfix">
			        	<a href="{{ url('/login') }}" class="btn btn-primary btn-block pull-left"><span class="glyphicon glyphicon-log-in"></span> <strong>Log In</strong></a>
			        	<a href="{{ url('/register') }}" class="btn btn-success btn-block pull-right"><span class="glyphicon glyphicon-user"></span> <strong>Register</strong></a>
			        	</div>
		        	</div>
	        	</div>
        	</div>
        </div>
    @else
    	<div class="row">
			<div class="col-sm-2">
				<!-- Nav tabs -->
				<ul class="nav nav-pills nav-stacked" role="tablist">
					<li role="presentation" class="active"><a href="#dashboard" aria-controls="dashboard" role="tab" data-toggle="pill">Dashboard</a></li>
					<li role="presentation"><a href="#purchases" aria-controls="purchases" role="tab" data-toggle="pill">Purchases</a></li>
					<li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="pill">Settings</a></li>
				</ul>
			</div>
			<div class="col-sm-10">
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
					        	<h4><small>NAME</small> {{ Auth::user()->name }}</h4>
					        	<h4><small>EMAIL</small> {{ Auth::user()->email }}</h4>
					        	<h4><small>ADDRESS</small> {{ Auth::user()->email }}</h4>
				        	</div>
			        	</div>
		        	</div>
		        	<div class="col-sm-6">
			        	<div class="panel panel-default">
				        	<div class="panel-heading">
					        	<h3 class="lead">Payment Information</h3>
				        	</div>
				        	<div class="panel-body">
					        	<h4><small>NAME</small> {{ Auth::user()->name }}</h4>
					        	<h4><small>EMAIL</small> {{ Auth::user()->email }}</h4>
					        	<h4><small>ADDRESS</small> {{ Auth::user()->email }}</h4>
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
			        	<p>Purchase History will go here</p>
		        	</div>
		        	<table class="table table-condensed table-hover">
			        	<thead>
				        	<tr>
					        	<th>What</th>
					        	<th>What</th>
					        	<th>What</th>
					        	<th>What</th>
				        	</tr>
			        	</thead>
			        	<tbody>
				        	<tr>
					        	<th>1</th>
					        	<td>This</td>
					        	<td>This</td>
					        	<td>This</td>
				        	</tr>
				        	<tr>
					        	<th>1</th>
					        	<td>This</td>
					        	<td>This</td>
					        	<td>This</td>
				        	</tr>
				        	<tr>
					        	<th>1</th>
					        	<td>This</td>
					        	<td>This</td>
					        	<td>This</td>
				        	</tr>
			        	</tbody>
		        	</table>
	        	</div>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="settings">
					<div class="panel panel-default">
						<div class="panel-body">
							Account Deletion will go here
						</div>
					</div>
				</div>
			</div>
			</div>
        </div>
    @endif
@endsection