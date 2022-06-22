@extends('Layouts.app')

@section('title')
{{"Add Product"}}
@endsection

@section('content')

<style>
	.Container {
        width:500px;
        margin: 15px 420px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px black;
        margin-bottom: 50px;
        

      }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<div class="Container">
	
<br>
	<form method="post" action="{{ route('pro_edit') }}">
	{{csrf_field()}}

		<div class="col-md-10 offset-md-1" style="text-align:center;">
			<img src=  "{{url('storage/product/product_images/'.$product->image)}}" 
			style="width: 200px; height:200px;">
		</div>


		<div class="col-md-10 offset-md-1">
		  <input class="form-control" type="text" name=	"p_id" placeholder="Product Id" value="{{$product->id}}">
		  <br>
		</div>


		<div class="col-md-10 offset-md-1">
		  <input class="form-control" type="text" name=	"p_name" placeholder="Enter Product Name" value="{{$product->product_name}}">
		  	@if($errors->has('p_name'))
			<span class="text-danger">
				<strong> {{$errors->first('p_name')}} </strong>
			</span>
			@endif <br>
		</div>

		<div class="col-md-10 offset-md-1">
		  <input class="form-control" type="text" name=	"p_code" value="{{$product->product_code}}" placeholder="Enter Product Code">
		  	@if($errors->has('p_code'))
			<span class="text-danger">
				<strong> {{$errors->first('p_code')}} </strong>
			</span>
			@endif <br>
		</div>

		<div class="col-md-10 offset-md-1">
			<textarea class="form-control" style="height:200px;" placeholder="Enter Product Description" name="p_desc" name="main">{{ $product->product_desc }}> </textarea>
		  	@if($errors->has('p_desc'))
			<span class="text-danger">
				<strong> {{$errors->first('p_desc')}} </strong>
			</span>
			@endif <br>
		</div>

		<div class="col-md-10 offset-md-1" >
	    
		    <select class="form-select" name="p_category" >
		      <option selected>Category</option>
		      <option value="Laptop"{{ $product->product_category == 'Laptop' ? 'selected' : '' }}> Laptop </option>
		      <option value="Monitor" {{ $product->product_category == 'Monitor' ? 'selected' : '' }}> Monitor </option>
		      <option value="HDD" {{ $product->product_category == 'HDD' ? 'selected' : '' }}> HDD </option>
		      <option value="SDD" {{ $product->product_category == 'SDD' ? 'selected' : '' }}> SDD </option>
		    </select>

		    @if($errors->has('p_category'))
			<span class="text-danger">
				<strong> {{$errors->first('p_category')}} </strong>
			</span>
			@endif <br>

	  	</div>

	  	<div class="col-md-10 offset-md-1" >

	  		<input class="form-control" type="text" name="p_price" value="{{$product->price}}" placeholder="Enter Product Price">
		  	@if($errors->has('p_price'))
			<span class="text-danger">
				<strong> {{$errors->first('p_price')}} </strong>
			</span>
			@endif <br>

	  	</div>

	  	<div class="col-md-10 offset-md-1" >

	  		<input class="form-control" type="text" name="p_quantity" value="{{$product->product_quantity}}" placeholder="Enter Product Quantity">
		  	@if($errors->has('p_quantity'))
			<span class="text-danger">
				<strong> {{$errors->first('p_quantity')}} </strong>
			</span>
			@endif <br>

	  	</div>

	  	<div class="col-md-10 offset-md-1" >
	    
		    <select class="form-select" name="p_purchase" >
		      <option selected>Purchase</option>
		      <option value="Yes" {{ $product->product_purchased == 'Yes' ? 'selected' : '' }} >YES</option>
		      <option value="No" {{ $product->product_purchased == 'No' ? 'selected' : '' }} >NO</option>
		      
		    </select>

		    @if($errors->has('p_purchase'))
			<span class="text-danger">
				<strong> {{$errors->first('p_purchase')}} </strong>
			</span>
			@endif <br>

	  	</div>

	  	<div class="col-md-10 offset-md-1" >
		    <input type="Submit" name="ADD" value="Update" class="btn btn-success" style="width: 150px;">
	  	</div>

		<br>
		<br>


	</form>
	
</div>


@endsection