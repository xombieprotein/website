<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>@yield('title')</title>
		
		<meta name="description" content=@yield('description')>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/css/main.css">
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-static-top">
	      <div class="container-fluid">
	        <!-- Brand and toggle get grouped for better mobile display -->
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="/">Xombie Protein</a>
	        </div>
			
	        <!-- Collect the nav links, forms, and other content for toggling -->
	        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	        	<ul class="nav navbar-nav navbar-right">
		        	<li>
		        		<a href="{{ route('product.shoppingCart') }}"><span class="glyphicon glyphicon-shopping-cart"></span>
			        		Cart <span class="badge">{{ (Session::has('cart') ? Session::get('cart')->totalQty : '') }}</span>
		        		</a>
	        		</li>
					<li><a href="{{ url('shop') }}"><span class="glyphicon glyphicon-usd"></span> Shop</a></li>
					@if(!Auth::user())
                    	<li><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
						<li><a href="{{ url('/register') }}"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                    @else
                    	<li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
	                            <li><a href="{{ url('/profile') }}"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
                            </ul>
                        </li>
                 @endif
	          </ul>
	        </div><!-- /.navbar-collapse -->
	      </div><!-- /.container-fluid -->
	    </nav>
			@yield('header')
	    <div class="container-fluid">
			@yield('content')
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		@yield('scripts')
	</body>
</html>
