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
				<div class="col-sm-8 col-sm-offset-2 text-center">
					<h1 class="text-uppercase" id="hero-heading">Xombie Protein</h1>
					<h3 id="hero-body" class="lead">
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
	<div class="row" id="promo">
		<h1 class="text-center text-uppercase" >Our Best Sellers from the store</h1>
		<div class="col-sm-6" id="xpImg-1">
			<h2 class="text-center">Chocolate</h2>
		</div>
		<div class="col-sm-6" id="xpImg-2">
			<h2 class="text-center">Banana</h2>
		</div>
	</div>
	<div class="row" id="chimp">
		<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-md-6">
						<img src="img/mail.svg" class="center-block" width="60%" id="letter" alt="Cartoon Picture of Open Letter">
						<h3 class=" text-center">Subscribe To Our Mailing List</h3>
						<p class="text-center lead">
							We will send you an email whenever we have a new product
							or when we have a sale. We promise to never spam you.
						</p>
					</div>
					<div class="col-md-6">
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
						<div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
						<div class="mc-field-group">
						    <label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
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
						    </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
						   <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_d101e0a3a54001d8b8a71238c_b99ae340a5" tabindex="-1" value=""></div>
						   <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
						   </div>
						</form>
						</div>
						<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
						<!--End mc_embed_signup-->
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection