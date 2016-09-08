@extends('layouts.layout')

@section('title')
	Shop Xombie Products
@endsection
@section('description')
	Administrator Edit Product
@endsection

@section('content')
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2 class="text-center">Edit Product Information</h2>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" role="form" method="POST" action="/product/update/{{ $product->id }}">
					{{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <p class="text-center lead">Product Details</p>
                    <div class="form-group">
                        <label for="productName" class="col-md-4 control-label">Product Name</label>

                        <div class="col-md-6">
                            <input id="productName" type="text" class="form-control" name="productName" value="{{ $product->productName }}">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="productDescription" class="col-md-4 control-label">Product Description</label>

                        <div class="col-md-6">
                            <input id="productDescription" type="text" class="form-control" name="productDescription" value="{{ $product->productDescription }}">
                        </div>
                    </div>
					<div class="form-group">
                        <label for="stockAmount" class="col-md-4 control-label">Stock</label>

                        <div class="col-md-6">
                            <input id="stockAmount" type="number" pattern="0-9" class="form-control" name="stockAmount" value="{{ $product->stockAmount }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price" class="col-md-4 control-label">Price</label>

                        <div class="col-md-6">
                            <input id="price" type="number" pattern="0-9" class="form-control" name="price" value="{{ $product->price }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="productWeight" class="col-md-4 control-label">Weight</label>

                        <div class="col-md-6">
                            <input id="productWeight" type="text" class="form-control" name="productWeight" value="{{ $product->productWeight }}">
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