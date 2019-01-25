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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/time', function () {
    return view('admin.time');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/add_staff','AdminController@index');
Route::post('/admin/add_staff','AdminController@add_staff');

Route::get('/admin/product','AdminProductController@product');
Route::get('/admin/product/{id}','AdminProductController@show');
Route::post('/admin/add_product','AdminProductController@add_product');
Route::post('/admin/edit_product','AdminProductController@edit_product');
Route::post('/admin/decrease_product','AdminProductController@decrease_product');
Route::get('/admin/delete_product/{id}','AdminProductController@delete_product');


Route::post('/admin/add_transaction','AdminController@add_transaction');
Route::post('/admin/transaction/date', 'AdminTransactionController@date');
Route::get('/admin/transaction/{start_date}/{end_date}', 'AdminTransactionController@search');
Route::get('/admin/transaction', 'AdminTransactionController@index');
Route::post('/admin/transaction/salary', 'AdminTransactionController@salary');
Route::post('/admin/transaction/add', 'AdminTransactionController@store');
Route::post('/admin/transaction/income', 'AdminTransactionController@income');

Route::get('/admin/time', 'AdminTimeController@index');
Route::get('/admin/time/{i}/{doctor_staff_id}/{shift_id}','AdminTimeController@store');
Route::get('/admin', 'AdminController@dashboard');

Route::get('/test', function() {
    return view('test');
});
