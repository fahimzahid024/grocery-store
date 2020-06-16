<?php

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

Route::get('/','adminController@index');



/********************Category Controller***********************/
Route::get('/add-category','categoryController@index');
Route::post('/save-category','categoryController@save_category');
Route::get('/view-category','categoryController@view_category');
Route::get('/delete-category/{category_id}', 'categoryController@delete_category');
Route::get('/edit-category/{category_id}','categoryController@edit_category');
Route::post('/update-category/{category_id}','categoryController@update_category');
Route::get('/unactive-category/{category_id}','categoryController@unactive_category');
Route::get('/active-category/{category_id}','categoryController@active_category');



/********************Product Controller**************************/
Route::get('/add-product','productController@index');
Route::post('/save-product', 'productController@save_product');
Route::get('/view-product','productController@view_product');
Route::get('/delete-product/{product_id}', 'productController@delete_product');
Route::get('/edit-product/{product_id}', 'productController@edit_product');
Route::post('/update-product/{product_id}', 'productController@update_product');
Route::get('/unactive-product/{product_id}', 'productController@unactive_product');
Route::get('/active-product/{product_id}', 'productController@active_product');


