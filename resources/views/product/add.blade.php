@extends('layouts.layout')

@section('title')
	Shop Xombie Products
@endsection
@section('description')
	Administrator Add Product
@endsection

@section('content')
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2 class="text-center">Add Product Information</h2>
			</div>
			<div class="panel-body">
				
				{!! Form::open(array('url'=>'product/store','method'=>'POST', 'files'=>true, 'class'=>'form-horizontal')) !!}
                    <p class="text-center lead">Product Details</p>
                    <div class="form-group">
	                    {!! Form::label('imagePath', 'Product Image', array('class'=>'col-md-4 control-label')) !!}
						<div class="col-md-6">
							{!! Form::file('imagePath') !!}
						</div>
					</div>
					<div class="form-group">
                        <label for="productName" class="col-md-4 control-label">Product Name</label>
                        <div class="col-md-6">
                            <input id="productName" type="text" class="form-control" name="productName">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="productDescription" class="col-md-4 control-label">Product Description</label>

                        <div class="col-md-6">
                            <input id="productDescription" type="text" class="form-control" name="productDescription">
                        </div>
                    </div>
					<div class="form-group">
                        <label for="stockAmount" class="col-md-4 control-label">Stock</label>

                        <div class="col-md-6">
                            <input id="stockAmount" type="number" pattern="0-9" class="form-control" name="stockAmount">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price" class="col-md-4 control-label">Price</label>

                        <div class="col-md-6">
                            <input id="price" type="number" pattern="0-9" class="form-control" name="price">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="productWeight" class="col-md-4 control-label">Weight</label>

                        <div class="col-md-6">
                            <input id="productWeight" type="text" class="form-control" name="productWeight">
                        </div>
                    </div>
					<div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-success">
                                <i class="glyphicon glyphicon-plus"></i> Add
                            </button>
                        </div>
                    </div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection