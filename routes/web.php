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

Route::get('/admin/product','AdminController@product');
Route::post('/admin/add_product','AdminController@add_product');
Route::post('/admin/edit_product','AdminController@edit_product');
Route::get('/admin/delete_product/{id}','AdminController@delete_product');


Route::post('/admin/add_transaction','AdminController@add_transaction');
Route::post('/admin/transaction/date', 'AdminTransactionController@date');
Route::get('/admin/transaction/{start_date}/{end_date}', 'AdminTransactionController@search');
Route::get('/admin/transaction', 'AdminTransactionController@index');
Route::post('/admin/transaction/salary', 'AdminTransactionController@salary');
Route::post('/admin/transaction/add', 'AdminTransactionController@store');
Route::post('/admin/transaction/income', 'AdminTransactionController@income');

Route::get('/admin/time', 'AdminTimeController@index');