<?php

use Illuminate\Support\Facades\Route;

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
    return redirect()->route('login');
});

Auth::routes(['register' => false]);

//Common Routes
Route::resource('invoice', 'InvoiceController');
Route::get('get-quantity','AjaxController@getQuantity');
Route::post('invoice/store','AjaxController@storeInvoice');

//Admin Routes
Route::group(['namespace' => 'Admin', 'as' => 'admin.', 'prefix'=>'', 'middleware'=>'admin'], function (){
    Route::get('dashboard','DashboardController@index');
    Route::resource('permission', 'PermissionController');
    Route::resource('product', 'ProductController');
    Route::resource('sale', 'SaleController');
    Route::resource('staff', 'StaffController');
    Route::post('staff-update', 'StaffController@update');

});

//Staff Routes
Route::group(['namespace' => 'Staff', 'as' => 'staff.', 'prefix'=>''], function (){

});

