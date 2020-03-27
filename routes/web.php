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
//Frontend
Route::get('/','Homecontroller@index');
Route::get('/home-page','Homecontroller@index');

//Server admin
Route::get('/admin','AdminController@index');//layout-login
Route::get('/dashboard','AdminController@show_Dashboard');//layout_dashboard
Route::get('/logout','AdminController@logout');//logout
Route::post('/admin-dashboard','AdminController@dashboard');//phương thức checkin của form

//Category Product
Route::get('/all-category','CategoryProduct@all_category');
Route::get('/add-category','CategoryProduct@add_category');

Route::get('/delete-category-product/{category_product_id}','CategoryProduct@delete_category_product');
Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category_product');
Route::get('/active-category-product/{category_product_id}','CategoryProduct@active_category_product');
Route::get('/unactive-category-product/{category_product_id}','CategoryProduct@unactive_category_product');

Route::post('/save-category-product','CategoryProduct@save_category_product');
Route::post('/update-category-product/{category_product_id}','CategoryProduct@update_category_product');

//Brand Product
Route::get('/all-brand','Brandproduct@all_brand');
Route::get('/add-brand','Brandproduct@add_brand');

Route::get('/delete-brand-product/{brand_product_id}','Brandproduct@delete_brand_product');
Route::get('/edit-brand-product/{brand_product_id}','Brandproduct@edit_brand_product');
Route::get('/active-brand-product/{brand_product_id}','Brandproduct@active_brand_product');
Route::get('/unactive-brand-product/{brand_product_id}','Brandproduct@unactive_brand_product');

Route::post('/save-brand-product','Brandproduct@save_brand_product');
Route::post('/update-brand-product/{brand_product_id}','Brandproduct@update_brand_product');

//Product
Route::get('/all-product','ProductController@all_product');
Route::get('/add-product','ProductController@add_product');

Route::get('/delete-product/{product_id}','ProductController@delete_product');
Route::get('/edit-product/{product_id}','ProductController@edit_product');
Route::get('/active-product/{product_id}','ProductController@active_product');
Route::get('/unactive-product/{product_id}','ProductController@unactive_product');

Route::post('/save-product','ProductController@save_product');
Route::post('/update-product/{product_id}','ProductController@update_product');

