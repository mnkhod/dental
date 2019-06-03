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

Route::get('test', function() {
    return view('test');
});

Route::get('/', function () {
    $roles = \App\Role::where('role_id', 2);
    return view('welcome', compact('roles'));
});
Route::get('emchilgeenuud', function () {
    return view('emchilgeenuud');
});
Route::get('huuhdiinemchilgee', function () {
    return view('huuhdiinemchilgee');
});
Route::get('adulttreatment', function () {
    return view('adulttreatment');
});
Route::get('emchilge', function () {
    return view('emchilge');
});
Route::get('mesemchilgee', function () {
    return view('mesemchilgee');
});

Route::get('/time', function () {
    return view('admin.time');
});
Route::get('/user','UserController@index');

Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');


//--ADMIN STARTING--
Route::get('/admin/dashboard', 'AdminController@dashboard');
Route::get('/admin/shifts', 'AdminTimeController@index');

Route::get('/admin/add_staff/{id}/profile', 'AdminController@profile');
Route::get('/admin/add_staff/fire/{id}','AdminController@fire');
Route::get('/admin/add_staff','AdminController@index');
Route::post('/admin/add_staff','AdminController@add_staff');
Route::get('/admin/staff_check/{id}/{start_date}/{end_date}', 'AdminStaffController@search');
Route::post('/admin/staff/by_month', 'AdminStaffController@by_month');
Route::post('/admin/staff/date', 'AdminStaffController@date');


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
Route::get('/admin/time/{i}/{doctor_staff_id}/{shift_id}','AdminTimeController@store');
Route::get('/admin/time/week/{id}', 'AdminTimeController@timeWeek');
Route::post('/admin/time/add', 'AdminTimeController@storeAppointment');
Route::get('/admin/time/cancel','AdminTimeController@cancelAppointment');

Route::post('/admin/transaction/date', 'AdminTransactionController@date');
Route::get('/admin/transaction', 'AdminTransactionController@index');
Route::get('/admin/transaction/{start_date}/{end_date}', 'AdminTransactionController@search');
Route::post('/admin/transaction/by_month','AdminTransactionController@by_month');

Route::post('/admin/transactions/salary', 'AdminTransactionController@salary');
Route::post('/admin/transactions/add', 'AdminTransactionController@store');
Route::post('/admin/transactions/income', 'AdminTransactionController@income');
Route::post('/admin/transactions/outcome/type', 'AdminTransactionController@outcomeCategory');

Route::get('/admin/hospital','AdminHospitalController@index');
Route::get('/admin/hospital/{from}/{to}', 'AdminHospitalController@date');
Route::post('/admin/hospital/by_month','AdminHospitalController@by_month');
Route::post('/admin/hospital/by_date','AdminHospitalController@by_date');

Route::get('/admin/logs','AdminController@logs');
Route::get('/admin/users','AdminController@users');
Route::get('/admin/user_check/{id}','AdminController@user_check');
Route::get('/admin/search', 'AdminController@search');

Route::get('/admin/treatment', 'AdminTreatmentController@index');
Route::post('/admin/treatment/store', 'AdminTreatmentController@store');
Route::post('/admin/treatment/storeTreatmentSelection', 'AdminTreatmentController@storeTreatmentSelection');
Route::post('/admin/treatment/updateTreatmentSelection', 'AdminTreatmentController@updateTreatmentSelection');
Route::post('/admin/treatment/update', 'AdminTreatmentController@update');
Route::get('/admin/treatment/{id}', 'AdminTreatmentController@edit');
Route::get('/admin/treatment/{id}/{s_id}', 'AdminTreatmentController@editTreatmentSelection');


//--ACCOUNTANT STARTING--
Route::post('/accountant/transactions/date', 'AccountantTransactionController@date');
Route::get('/accountant/transactions', 'AccountantTransactionController@index');
Route::post('/accountant/transactions/edit', 'AccountantTransactionController@edit');
Route::post('/accountant/transactions/delete','AccountantTransactionController@delete');
Route::get('/accountant/transactions/{start_date}/{end_date}', 'AccountantTransactionController@search');
Route::post('/accountant/transactions/by_month','AccountantTransactionController@by_month');

Route::post('/accountant/transactions/salary', 'AccountantTransactionController@salary');
Route::post('/accountant/transactions/add', 'AccountantTransactionController@store');
Route::post('/accountant/transactions/income', 'AccountantTransactionController@income');
Route::post('/accountant/transactions/outcome/type', 'AccountantTransactionController@outcomeCategory');

Route::get('/accountant/products','AccountantProductController@product');
Route::get('/accountant/products/{id}','AccountantProductController@show');
Route::post('/accountant/add_product','AccountantProductController@add_product');
Route::post('/accountant/edit_product','AccountantProductController@edit_product');
Route::post('/accountant/change_product/{id}','AccountantProductController@change_product');
Route::get('/accountant/change_product/{id}','AccountantProductController@change_product');
Route::get('/accountant/change_product_index/{id}','AccountantProductController@change_product_index');
Route::post('/accountant/change_product_index/{id}','AccountantProductController@change_product_index');
Route::post('/accountant/decrease_product','AccountantProductController@decrease_product');
Route::get('/accountant/delete_product/{id}','AccountantProductController@delete_product');

Route::get('/accountant/items','AccountantItemController@item');
Route::get('/accountant/items/{id}','AccountantItemController@show');
Route::post('/accountant/add_item','AccountantItemController@add_item');
Route::post('/accountant/edit_item','AccountantItemController@edit_item');
Route::get('/accountant/change_item_index/{id}','AccountantItemController@change_item_index');
Route::post('/accountant/change_item_index/{id}','AccountantItemController@change_item_index');
Route::get('/accountant/change_item/{id}','AccountantItemController@change_item');
Route::post('/accountant/change_item/{id}','AccountantItemController@change_item');



Route::get('/accountant/staffs', 'AccountantStaffController@index');
Route::get('/accountant/staff_check/{id}','AccountantStaffController@staff_check');
Route::get('/accountant/staff_check/{id}/{start_date}/{end_date}', 'AccountantStaffController@search');
Route::post('/accountant/staff/by_month', 'AccountantStaffController@by_month');
Route::post('/accountant/staff/date', 'AccountantStaffController@date');

Route::get('/accountant/hospital', 'AccountantHospitalController@index');
Route::get('/accountant/hospital/{from}/{to}', 'AccountantHospitalController@date');
Route::post('/accountant/hospital/by_month','AccountantHospitalController@by_month');
Route::post('/accountant/hospital/by_date','AccountantHospitalController@by_date');

//--RECEPTION STARTING--
Route::get('/reception/user', 'ReceptionUserController@index');
Route::post('/reception/user/store','ReceptionUserController@store');
Route::post('/reception/user/update','ReceptionUserController@update');
Route::get('/reception/user/register/{name}/{phone}/{appointment_id}', 'ReceptionUserController@fromAppointment');
Route::get('/reception/search', 'ReceptionUserController@search');
Route::get('/reception/time', 'ReceptionTimeController@time');
Route::get('/reception/time/week/{id}', 'ReceptionTimeController@timeWeek');
Route::get('/reception/time/week/{id}/{user_id}', 'ReceptionTimeController@timeWeekAppointment');
Route::post('/reception/time/add', 'ReceptionTimeController@store');
Route::get('/reception/time/cancel','ReceptionTimeController@cancel');
Route::get('/reception/time/{id}','ReceptionTimeController@appointment');
Route::get('/reception/user_check/{id}','ReceptionUserController@user_check');
Route::get('/reception/user_check/{id}/update','ReceptionUserController@user_update');
Route::post('/reception/user_check/{id}','ReceptionUserController@user_check_edit');
Route::get('/reception/user_check/{user_id}/{appointment_id}/check_in','ReceptionTimeController@check_in');
Route::get('/reception/shifts', 'ReceptionShiftsController@index');
Route::get('/reception/shifts/cancel','ReceptionShiftsController@cancel');
Route::get('/reception/shifts/{i}/{doctor_staff_id}/{shift_id}','ReceptionShiftsController@store');
Route::get('/reception/payment', 'ReceptionPaymentController@index');
Route::post('/reception/payment/store','ReceptionPaymentController@store');
Route::get('/reception/lease','ReceptionPaymentController@lease');
Route::post('/reception/lease/store','ReceptionPaymentController@lease_store');
Route::get('/reception/lease/store','ReceptionPaymentController@lease_store');
Route::get('/reception/product','ReceptionPaymentController@product');
Route::get('/reception/product/{id}','ReceptionPaymentController@show');
Route::post('/reception/decrease_product','ReceptionPaymentController@decrease_product');

//--DOCTOR STARTING--
Route::get('/doctor','DoctorController@index');
Route::get('/doctor/dash','DoctorController@dash');
Route::get('/doctor/treatment/{user_id}','DoctorTreatmentController@index');
Route::get('/doctor/treatment/{user_id}/gajig','DoctorTreatmentController@gajig');
Route::get('/doctor/treatment/{user_id}/sogog','DoctorTreatmentController@sogog');
Route::get('/doctor/treatment/{user_id}/mes','DoctorTreatmentController@mes');
Route::post('/doctor/treatment/store','DoctorTreatmentController@store');
Route::post('/doctor/treatment/finish','DoctorTreatmentController@finish');
Route::post('/doctor/treatment/xray','DoctorTreatmentController@xray');
Route::get('/doctor/treatment/history/{id}','DoctorTreatmentController@delete_history');

Route::get('/doctor/dashboard/','DoctorController@dashboard');
Route::get('/doctor/dashboard/{start_date}/{end_date}', 'DoctorController@search');
Route::post('/doctor/dashboard/by_month', 'DoctorController@by_month');
Route::post('/doctor/dashboard/date', 'DoctorController@date');
