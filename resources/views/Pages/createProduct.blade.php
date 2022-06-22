@extends('Layouts.app')

@section('title')
{{"Add Product"}}
@endsection

@section('content')

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap');
	.Container {
        width:500px;
        margin: 15px 420px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px black;
        margin-bottom: 50px;
        

      }
	  .heading{

		margin:15px;
		text-align:center;
		font-family: Poppins;
		
	  }


</style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


<div class="heading">
	<h1 style="font-size: 25px;"> Create New Product</h1>
</div>
<div class="Container">
<br>
	<form method="post" action="{{ route('productCreate') }}" enctype="multipart/form-data">
	{{csrf_field()}}


		<div class="col-md-10 offset-md-1">
		  <input class="form-control" type="text" name=	"p_name" placeholder="Enter Product Name">
		  	@if($errors->has('p_name'))
			<span class="text-danger">
				<strong> {{$errors->first('p_name')}} </strong>
			</span>
			@endif <br>
		</div>

		<div class="col-md-10 offset-md-1">
		  <input class="form-control" type="text" name=	"p_code" placeholder="Enter Product Code">
		  	@if($errors->has('p_code'))
			<span class="text-danger">
				<strong> {{$errors->first('p_code')}} </strong>
			</span>
			@endif <br>
		</div>

		<div class="col-md-10 offset-md-1">
		  <textarea class="form-control" name="p_desc" placeholder="Enter Product Description"> </textarea>
		  	@if($errors->has('p_desc'))
			<span class="text-danger">
				<strong> {{$errors->first('p_desc')}} </strong>
			</span>
			@endif <br>
		</div>

		<div class="col-md-10 offset-md-1" >
	    
		    <select class="form-select" name="p_category" required>
		      <option selected>Category</option>
		      <option value="Laptop">Laptop</option>
		      <option value="Monitor">Monitor</option>
		      <option value="HDD">HDD</option>
		      <option value="SDD">SDD</option>
		    </select>

		    @if($errors->has('p_category'))
			<span class="text-danger">
				<strong> {{$errors->first('p_category')}} </strong>
			</span>
			@endif <br>

	  	</div>

	  	<div class="col-md-10 offset-md-1" >

	  		<input class="form-control" type="text" name="p_price" placeholder="Enter Product Price">
		  	@if($errors->has('p_price'))
			<span class="text-danger">
				<strong> {{$errors->first('p_price')}} </strong>
			</span>
			@endif <br>

	  	</div>

	  	<div class="col-md-10 offset-md-1" >

	  		<input class="form-control" type="text" name="p_quantity" placeholder="Enter Product Quantity">
		  	@if($errors->has('p_quantity'))
			<span class="text-danger">
				<strong> {{$errors->first('p_quantity')}} </strong>
			</span>
			@endif <br>

	  	</div>

	  	<div class="col-md-10 offset-md-1" >
	    
		    <select class="form-select" name="p_purchase">
		      <option selected>Purchase</option>
		      <option value="Yes">YES</option>
		      <option value="No">NO</option>
		      
		    </select>

		    @if($errors->has('p_purchase'))
			<span class="text-danger">
				<strong> {{$errors->first('p_purchase')}} </strong>
			</span>
			@endif <br>

	  	</div>

		<div class="col-md-10 offset-md-1" >
			<label>Upload Product Image</label><br> <br>
			<input class="from-control" type="file" name="image">
			<br>
			<br>
		</div>

	  	<div class="col-md-10 offset-md-1" >
		    <input type="Submit" name="ADD" value="ADD" class="btn btn-success" style="width: 150px;">
	  	</div>


		<br>
		<br>


	</form>
	
</div>


@endsection