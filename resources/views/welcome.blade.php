@extends('layouts.layout')

@section('title')
	
		Xombie Protein
	
@endsection

@section('description')
		Xombie Protein
@endsection

@section('header')

	<div class="jumbotron" id="hero">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-8 col-xs-offset-2 col-sm-offset-3 col-sm-6 text-center">
					<h1 class="text-uppercase" id="hero-heading">Xombie Protein</h1>
					<h3 class="lead" id="hero-body">
						This is where you put a stirring message
						about making massive gains and getting swole.
						Make a call to to action after this to get
						people to spend their money on your business.
					</h3>
					<a class="btn btn-success btn-lg" href="{{ url('shop') }}"><span class="glyphicon glyphicon-shopping-cart"></span> Shop Now</a>
				</div>
			</div>
		</div>
	</div>

@endsection
@section('content')
	<div class="row" id="hook">
		<div class="col-sm-8 col-sm-offset-2">
		<h1 class="text-center text-uppercase">Get the best protein for your goals</h1>
		<h3 class="text-center text-capitalize">Xombie Protein offers a range of protein supplements for all sorts of workout routines to help you achieve your maximum potential.</h3>
		</div>
	</div>
	<div class="row">
		<h2 class="text-center"><small>Our No. 1 Sellers from the store.</small></h2>
		<hr>
		<div class="row text-center">
			<div class="col-sm-4 col-md-4">
				<img src="img/protein.png" class="img-responsive center-block">
				<h3>Chocolate</h3>
				<p><a class="btn btn-success" href="{{ url('shop') }}">Shop Now</a></p>
			</div>
			<div class="col-sm-4 col-md-4">
				<img src="img/protein.png" class="img-responsive center-block">
				<h3>Strawberry</h3>
				<p><a class="btn btn-success" href="{{ url('shop') }}">Shop Now</a></p>
			</div>
			<div class="col-sm-4 col-md-4">
				<img src="img/protein.png" class="img-responsive center-block">
				<h3>Banana</h3>
				<p><a class="btn btn-success" href="{{ url('shop') }}">Shop Now</a></p>
			</div>
		</div>
		<div class="panel panel-item" id="block">
			<div class="panel-heading">
				<h1>Why Choose Xombie?</h1>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-4">
								<img src="img/protein.png" class="img-responsive center-block">
							</div>
							<div class="col-sm-8">
								<h2>Better Energy Consumption</h2>
								<p class="lead">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3 col-md-6">
				<!-- Begin MailChimp Signup Form -->
				<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
				<style type="text/css">
				    #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
				    /* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
				       We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
				</style>
				<div id="mc_embed_signup">
				<form action="//azurewebsites.us1.list-manage.com/subscribe/post?u=d101e0a3a54001d8b8a71238c&amp;id=b99ae340a5" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
				   <div id="mc_embed_signup_scroll">
				    <h2>Subscribe to our mailing list</h2>
				<div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
				<div class="mc-field-group">
				    <label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
				</label>
				    <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
				</div>
				<div class="mc-field-group">
				    <label for="mce-FNAME">First Name </label>
				    <input type="text" value="" name="FNAME" class="" id="mce-FNAME">
				</div>
				<div class="mc-field-group">
				    <label for="mce-LNAME">Last Name </label>
				    <input type="text" value="" name="LNAME" class="" id="mce-LNAME">
				</div>
				    <div id="mce-responses" class="clear">
				        <div class="response" id="mce-error-response" style="display:none"></div>
				        <div class="response" id="mce-success-response" style="display:none"></div>
				    </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
				   <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_d101e0a3a54001d8b8a71238c_b99ae340a5" tabindex="-1" value=""></div>
				   <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
				   </div>
				</form>
				</div>
				<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
				<!--End mc_embed_signup-->
			</div>
		</div>
@endsection