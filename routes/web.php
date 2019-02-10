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
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

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
Route::get('/admin/add_staff/{id}/profile', 'AdminController@profile');

Route::get('/admin/add_staff/fire/{id}','AdminController@fire');

Route::get('/reception', 'ReceptionTimeController@index');
Route::get('/reception/user', 'ReceptionUserController@index');
Route::get('/reception/search', 'ReceptionUserController@search');
Route::get('/reception/time', 'ReceptionTimeController@time');
Route::post('/reception/time/add', 'ReceptionTimeController@store');
Route::get('/reception/time/cancel','ReceptionTimeController@cancel');

Route::get('/reception/appointment','ReceptionTimeController@appointment_index');
Route::post('/reception/appointment/edit/{id}','ReceptionTimeController@appointment_edit');
Route::get('/reception/appointment/cancel/{id}','ReceptionTimeController@appointment_cancel');



Route::get('/test', function() {
    return view('test');
});
