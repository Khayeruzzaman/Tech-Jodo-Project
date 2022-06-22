<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{

    public function product_add(){
    	
        return view('Pages.createProduct');
    }

    public function createProduct(Request $request){

        $this->validate($request,
            [
                'p_name' => 'required | string',
                'p_code' => 'required | string',
                'p_desc' => 'required | string',
                'p_category' => 'required | string | not_in:Category',
                'p_price' => 'required | integer',
                'p_quantity' => 'required | integer',
                'p_purchase' => 'required | string | not_in:Purchase',
                'image' => 'image | nullable | max:1999',
            ],

            [
                'p_name.required' => 'Please Enter The Product Name!',
                'p_code.required' => 'Please Enter The Product Code!',
                'p_desc.required' => 'Please Enter The Product Description!',
                'p_category.required' => 'Please Select Your Desire Product!',
                'p_price.required' => 'Please Enter The Product Price!',
                'p_quantity.required' => 'Please Enter Product Quantity!',
                'p_purchase.required' => 'Please Select Purchase!',

            ]
        );


        if($request->hasFile('image')){

            $fileNameWithExt = $request->file('image')->getClientOriginalName();

            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            $ext = $request->file('image')->getClientOriginalExtension();

            $fileNameToStore = $fileName.'_'.time().'.'.$ext;

            $path = $request->file('image')->storeAs('public/product/product_images', $fileNameToStore);

         }else{

            $fileNameToStore = 'noImage.jpg';
        }

        $var = new Product();
        $var->product_name= $request->p_name;
        $var->product_code = $request->p_code;
        $var->product_desc = $request->p_desc;
        $var->product_category = $request->p_category;
        $var->price = $request->p_price;
        $var->product_quantity = $request->p_quantity;
        $var->product_purchased = $request->p_purchase;
        $var->image = $fileNameToStore;
        $var->save();

        Alert::success('Congrats',"The Product has been added Successfully");
        
        return redirect()->route('product'); 
        
    }

    public function product_list(){

        $products = Product::all();

        return view('Pages.productList')->with('products', $products);
    }


    public function product_delete(Request $request){
        
        
        $product = Product::where('id',$request->id)->first();
        $product->delete();
        
        alert()->error('ErrorAlert','The product has been deleted.');

        return redirect()->route('p_list'); 
    }


    public function product_edit(Request $request){
        
        $id = $request->id;
        $product = Product::where('id',$id)->first();
        return view('Pages.productEdit')->with('product', $product);

    }

    public function productUpdate(Request $request){

        $this->validate($request,
            [
                'p_name' => 'required | string',
                'p_code' => 'required | string',
                'p_desc' => 'required | string',
                'p_category' => 'required | string | not_in:Category',
                'p_price' => 'required | integer',
                'p_quantity' => 'required | integer',
                'p_purchase' => 'required | string | not_in:Purchase'
            ],

            [
                'p_name.required' => 'Please Enter The Product Name',
                'p_code.required' => 'Please Enter The Product Code',
                'p_desc.required' => 'Please Enter The Product Description',
                'p_category.required' => 'Please Select Your Desire Product',
                'p_price.required' => 'Please Enter The Product Price',
                'p_quantity.required' => 'Please Enter Product Quantity',
                'p_purchase.required' => 'Please Select Purchase',

            ]
        );

        $var = Product::where('id',$request->p_id)->first();
        $var->product_name= $request->p_name;
        $var->product_code = $request->p_code;
        $var->product_desc = $request->p_desc;
        $var->product_category = $request->p_category;
        $var->price = $request->p_price;
        $var->product_quantity = $request->p_quantity;
        $var->product_purchased = $request->p_purchase;
        $var->save();
        
        Alert::success('Congrats',"The Product Has Been Successfully Updated!");
        return redirect()->route('p_list'); 
        
    }



    
}
