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
		<script type="text/javascript">
		  var appInsights=window.appInsights||function(config){
		    function i(config){t[config]=function(){var i=arguments;t.queue.push(function(){t[config].apply(t,i)})}}var t={config:config},u=document,e=window,o="script",s="AuthenticatedUserContext",h="start",c="stop",l="Track",a=l+"Event",v=l+"Page",y=u.createElement(o),r,f;y.src=config.url||"https://az416426.vo.msecnd.net/scripts/a/ai.0.js";u.getElementsByTagName(o)[0].parentNode.appendChild(y);try{t.cookie=u.cookie}catch(p){}for(t.queue=[],t.version="1.0",r=["Event","Exception","Metric","PageView","Trace","Dependency"];r.length;)i("track"+r.pop());return i("set"+s),i("clear"+s),i(h+a),i(c+a),i(h+v),i(c+v),i("flush"),config.disableExceptionTracking||(r="onerror",i("_"+r),f=e[r],e[r]=function(config,i,u,e,o){var s=f&&f(config,i,u,e,o);return s!==!0&&t["_"+r](config,i,u,e,o),s}),t
		    }({
			instrumentationKey:"f07f6818-7b21-4242-885b-bc39bb96aa4a"
		    });

		    window.appInsights=appInsights;
		    appInsights.trackPageView();
		</script>
	</head>
	<body>
		<script>
		  // This is called with the results from from FB.getLoginStatus().
		  function statusChangeCallback(response) {
		    console.log('statusChangeCallback');
		    console.log(response);
		    // The response object is returned with a status field that lets the
		    // app know the current login status of the person.
		    // Full docs on the response object can be found in the documentation
		    // for FB.getLoginStatus().
		    if (response.status === 'connected') {
		      // Logged into your app and Facebook.
		      testAPI();
		    } else if (response.status === 'not_authorized') {
		      // The person is logged into Facebook, but not your app.
		      document.getElementById('status').innerHTML = 'Please log ' +
			'into this app.';
		    } else {
		      // The person is not logged into Facebook, so we're not sure if
		      // they are logged into this app or not.
		      document.getElementById('status').innerHTML = 'Please log ' +
			'into Facebook.';
		    }
		  }

		  // This function is called when someone finishes with the Login
		  // Button.  See the onlogin handler attached to it in the sample
		  // code below.
		  function checkLoginState() {
		    FB.getLoginStatus(function(response) {
		      statusChangeCallback(response);
		    });
		  }

		  window.fbAsyncInit = function() {
		  FB.init({
		    appId      : '824932344275716',
		    cookie     : true,  // enable cookies to allow the server to access 
					// the session
		    xfbml      : true,  // parse social plugins on this page
		    version    : 'v2.5' // use graph api version 2.5
		  });

		  // Now that we've initialized the JavaScript SDK, we call 
		  // FB.getLoginStatus().  This function gets the state of the
		  // person visiting this page and can return one of three states to
		  // the callback you provide.  They can be:
		  //
		  // 1. Logged into your app ('connected')
		  // 2. Logged into Facebook, but not your app ('not_authorized')
		  // 3. Not logged into Facebook and can't tell if they are logged into
		  //    your app or not.
		  //
		  // These three cases are handled in the callback function.

		  FB.getLoginStatus(function(response) {
		    statusChangeCallback(response);
		  });

		  };

		  // Load the SDK asynchronously
		  (function(d, s, id) {
		    var js, fjs = d.getElementsByTagName(s)[0];
		    if (d.getElementById(id)) return;
		    js = d.createElement(s); js.id = id;
		    js.src = "//connect.facebook.net/en_US/sdk.js";
		    fjs.parentNode.insertBefore(js, fjs);
		  }(document, 'script', 'facebook-jssdk'));

		  // Here we run a very simple test of the Graph API after login is
		  // successful.  See statusChangeCallback() for when this call is made.
		  function testAPI() {
		    console.log('Welcome!  Fetching your information.... ');
		    FB.api('/me', function(response) {
		      console.log('Successful login for: ' + response.name);
		      document.getElementById('status').innerHTML =
			'Thanks for logging in, ' + response.name + '!';
		    });
		  }
		</script>
		<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
		</fb:login-button>
		<div id="status">
		</div>
		
		
		<div id="wrapper">
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
	                	<li><a href="mailto:sophie.smith@griffithuni.edu.au?subject=Xombie%20Protein%20Support%20Request"><i class="glyphicon glyphicon-envelope"></i> Contact</a></li> 
					</ul>
		        </div><!-- /.navbar-collapse -->
		      </div><!-- /.container-fluid -->
		    </nav>
				@yield('header')
		    <div class="container-fluid" id="pageContent">
				@yield('content')
			</div>
			<footer>
				<div class="container-fluid">
					<div class="col-lg-10 col-lg-offset-1">
						<div class="row">
							<div class="col-sm-3 col-xs-6" id="footerLeft">
								<h4 class="small">Navigate</h4>
								<ul id="footerNav">
									<li><a href="/"><span class="glyphicon glyphicon-home"></span> Home</a></li>
									<li><a href="{{ url('shop') }}"><span class="glyphicon glyphicon-usd"></span> Shop</a></li>
									@if(!Auth::user())
				                    	<li><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
										<li><a href="{{ url('/register') }}"><span class="glyphicon glyphicon-user"></span> Register</a></li>
				                    @else
				                    	<li><small><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }}</small></li>
				                    	<li class="nav-divider"></li>
			                            <li><a href="{{ url('/profile') }}"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
		                                <li><a href="{{ url('/logout') }}"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
					                 @endif
								</ul>
							</div>
							<div class="col-sm-3 col-sm-push-6 col-xs-6" id="footerRight">
								<h4 class="small">CONTACT US</h4>
								<ul id="footerNav">
									<li><a href="mailto:sophie.smith@griffithuni.edu.au?subject=Xombie%20Protein%20Support%20Request">Email</a></li>
									<li><a href="#">Twitter</a></li>
			                    	<li><a href="#">Facebook</a></li>
								</ul>
							</div>
							<div class="col-sm-6 col-sm-pull-3" id="footerCenter">
								<h4 class="small text-center">Keep Up To Date</h4>
								<h5 class="text-center">Get notified of new products, sales and promotions. Subscribe today!</h5>
								<form action="//azurewebsites.us1.list-manage.com/subscribe/post?u=d101e0a3a54001d8b8a71238c&amp;id=b99ae340a5" 
									  method="post" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-9">
												<input type="email" value="" name="EMAIL" class="email form-control" id="mce-EMAIL" placeholder="email address" required>
											</div>
											<div class="col-sm-3">
												<button type="submit" name="subscribe" class="btn btn-primary btn-block">Subscribe</button>
											</div>
										</div>
									</div>
								    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
								    <div style="position: absolute; left: -5000px; bottom:100px;" aria-hidden="true"><input type="text" name="b_d101e0a3a54001d8b8a71238c_b99ae340a5" tabindex="-1" value=""></div>
								</form>
								<!--End mc_embed_signup-->
							</div>
						</div>
					</div>
				</div>
			</footer>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
			@yield('scripts')
		</div>
	</body>
</html>
