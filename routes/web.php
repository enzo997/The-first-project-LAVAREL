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
