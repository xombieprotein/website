@extends('layouts.layout')

@section('title')
	Shop Xombie Products
@endsection
@section('description')
	Xombie Protein web store
@endsection

@section('content')
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2 class="text-center">Edit Your Profile</h2>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" role="form" method="POST" action="/profile/{{ $user->id }}">
					{{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <p class="text-center lead">Account Details</p>
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <hr>
                    <p class="text-center lead">Shipping Details</p>
					<div class="form-group">
                        <label for="address" class="col-md-4 control-label">Address</label>

                        <div class="col-md-6">
                            <input id="address" type="text" class="form-control" name="address" value="{{ Auth::user()->address }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="city" class="col-md-4 control-label">Suburb</label>

                        <div class="col-md-6">
                            <input id="city" type="text" class="form-control" name="city" value="{{ Auth::user()->city }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="state" class="col-md-4 control-label">State</label>

                        <div class="col-md-6">
                            <input id="state" type="text" class="form-control" name="state" value="{{ Auth::user()->state }}">
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="postalcode" class="col-md-4 control-label">Post Code</label>

                        <div class="col-md-6">
                            <input id="postalcode" type="text" pattern="0-9" class="form-control" name="postalcode" value="{{ Auth::user()->postalcode }}">
                    	</div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="glyphicon glyphicon-ok"></i> Update
                            </button>
                        </div>
                    </div>
                </form>
			</div>
		</div>
	</div>
@endsection