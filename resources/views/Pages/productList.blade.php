@extends('Layouts.app')

@section('title')
{{"All Product List"}}
@endsection

@section('content')

<style>
	.Container {
        width:98%;
        border-radius: 10px;
        box-shadow: 0px 0px 10px black;
        margin: 15px 5px 5px 13px;
      }
</style>

<div class="Container">

<br>
<table class="table table-striped table-hover">
	<tr style="Text-align:center;">
		<th>Product Image</th>
		<th>Name</th>
		<th>Code</th>
		<th>Description</th>
		<th>Category</th>
		<th>Price</th>
		<th>Quantity</th>
		<th>Purchase</th>
		<th>Action</th>
	</tr>
	@foreach($products as $product)
	<tr style="text-align:center; font-family: 'Poppins';font-size: 13px;">
		<td>
			<a href ="{{url('storage/product/product_images/'.$product->image)}}" >
			<img src=  "{{url('storage/product/product_images/'.$product->image)}}" 
			style="width: 40px; height:40px;"> </a> 
		</td> 
		<td>{{$product->product_name}}</td>
		<td>{{$product->product_code}}</td>
		<td style="width:400px;">{{$product->product_desc}}</td>
		<td>{{$product->product_category}}</td>
		<td>{{$product->price}}</td>
		<td>{{$product->product_quantity}}</td>
		<td>{{$product->product_purchased}}</td>
		<td style="text-align:center;">
			<a href="/product/edit/{{$product->id}}"> 
				<input type="Submit" name="edit" value="EDIT" class="btn btn-success" style=""> 
			</a>
			<br>
			<br>
			<a href="/product/delete/{{$product->id}}"> 
				<input type="Submit" name="edit" value="DELETE" class="btn btn-danger" style=""> 
			</a>
		</td>
	</tr>
	@endforeach
</table>
</div>
@endsection