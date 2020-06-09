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


