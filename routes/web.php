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

Route::get('/admin', 'AdminController@dashboard');
Route::get('/admin/shifts', 'AdminTimeController@index');


Route::get('/admin/add_staff/{id}/profile', 'AdminController@profile');
Route::get('/admin/add_staff/fire/{id}','AdminController@fire');
Route::get('/admin/add_staff','AdminController@index');
Route::post('/admin/add_staff','AdminController@add_staff');

Route::get('/admin/promotion','AdminPromotionController@index');
Route::post('/admin/promotion/add','AdminPromotionController@store');
Route::get('/admin/promotion_check/{id}','AdminPromotionController@promotion_check');

Route::get('/admin/product','AdminProductController@product');
Route::get('/admin/product/{id}','AdminProductController@show');
Route::post('/admin/add_product','AdminProductController@add_product');
Route::post('/admin/edit_product','AdminProductController@edit_product');
Route::post('/admin/decrease_product','AdminProductController@decrease_product');
Route::get('/admin/delete_product/{id}','AdminProductController@delete_product');

Route::get('/admin/time', 'AdminTimeController@time');
Route::get('/admin/time/week/{id}', 'AdminTimeController@timeWeek');
Route::post('/admin/time/add', 'AdminTimeController@storeAppointment');
Route::get('/admin/time/cancel','AdminTimeController@cancelAppointment');


Route::post('/admin/transaction/date', 'AdminTransactionController@date');
Route::get('/admin/transaction/{start_date}/{end_date}', 'AdminTransactionController@search');
Route::get('/admin/transaction', 'AdminTransactionController@index');
Route::post('/admin/transaction/salary', 'AdminTransactionController@salary');
Route::post('/admin/transaction/add', 'AdminTransactionController@store');
Route::post('/admin/transaction/income', 'AdminTransactionController@income');


Route::post('/accountant/transactions/date', 'AccountantTransactionController@date');
Route::get('/accountant/transactions/{start_date}/{end_date}', 'AccountantTransactionController@search');
Route::get('/accountant/transactions', 'AccountantTransactionController@index');
Route::post('/accountant/transactions/salary', 'AccountantTransactionController@salary');
Route::post('/accountant/transactions/add', 'AccountantTransactionController@store');
Route::post('/accountant/transactions/income', 'AccountantTransactionController@income');

Route::get('/accountant/shifts', 'AccountantShiftController@index');
Route::get('/accountant/shifts/cancel','AccountantShiftController@cancel');
Route::get('/accountant/shifts/{i}/{doctor_staff_id}/{shift_id}','AccountantShiftController@store');

Route::get('/accountant/products','AccountantProductController@product');
Route::get('/accountant/products/{id}','AccountantProductController@show');
Route::post('/accountant/add_product','AccountantProductController@add_product');
Route::post('/accountant/edit_product','AccountantProductController@edit_product');
Route::post('/accountant/decrease_product','AccountantProductController@decrease_product');
Route::get('/accountant/delete_product/{id}','AccountantProductController@delete_product');

Route::get('/accountant/staffs', 'AccountantStaffController@index');




Route::get('/reception', 'ReceptionTimeController@index');
Route::get('/reception/user', 'ReceptionUserController@index');
Route::get('/reception/search', 'ReceptionUserController@search');
Route::get('/reception/time', 'ReceptionTimeController@time');
Route::get('/reception/time/week/{id}', 'ReceptionTimeController@timeWeek');
Route::post('/reception/time/add', 'ReceptionTimeController@store');
Route::get('/reception/time/cancel','ReceptionTimeController@cancel');
Route::get('/reception/user_check/{id}','ReceptionUserController@user_check');
Route::post('/reception/user_check/{id}','ReceptionUserController@user_check_edit');
Route::get('/reception/user_check/{id}/check_in','ReceptionUserController@check_in');
Route::post('/reception/user_check/{id}/check_in','ReceptionUserController@check_in');


Route::get('/reception/appointment','ReceptionTimeController@appointment_index');
Route::post('/reception/appointment/edit/{id}','ReceptionTimeController@appointment_edit');
Route::get('/reception/appointment/cancel/{id}','ReceptionTimeController@appointment_cancel');

Route::get('/doctor','DoctorController@index');
Route::get('/doctor/treatment','DoctorTreatmentController@index');

Route::get('/test', function() {
    return view('test');
});
