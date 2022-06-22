<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Pages.createProduct');
});

Route::controller(ProductController::class)->group(function(){

    Route::get('/product/create','product_add')->name('product');
    Route::post('/product/create', 'createProduct')->name('productCreate');

    Route::get('/product/list', 'product_list')->name('p_list');

    Route::get('/product/delete/{id}', 'product_delete');

    
    Route::get('/product/edit/{id}', 'product_edit');
    Route::post('/product/edit', 'productUpdate')->name('pro_edit');

});