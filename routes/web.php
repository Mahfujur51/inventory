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
    return view('auth.login');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/employees','EmployeeController@index')->name('employee.index');
Route::get('/add/employee','EmployeeController@add')->name('employee.add');
Route::get('/view/employee/{id}','EmployeeController@view')->name('view.employee');
Route::get('/delete/employee/{id}','EmployeeController@delete')->name('delete.employee');
Route::post('/store/employee','EmployeeController@store')->name('employee.store');
Route::get('/edit/employee/{id}','EmployeeController@edit')->name('edit.employee');
Route::post('/update/employee/{id}','EmployeeController@update')->name('employee.update');

/*Route for Customer*/
Route::get('/customers','CustomerController@index')->name('customer.index');
Route::get('/add/customer','CustomerController@add')->name('customer.add');
Route::get('/view/customer/{id}','CustomerController@view')->name('view.customer');
Route::get('/delete/customer/{id}','CustomerController@delete')->name('delete.customer');
Route::post('/store/customer','CustomerController@store')->name('customer.store');
Route::get('/edit/customer/{id}','CustomerController@edit')->name('edit.customer');
Route::post('/update/customer/{id}','CustomerController@update')->name('customer.update');

//Route for Supplier
/*Route for Customer*/
Route::get('/suppliers','SupplierController@index')->name('supplier.index');
Route::get('/add/supplier','SupplierController@add')->name('supplier.add');
Route::get('/view/supplier/{id}','SupplierController@view')->name('view.supplier');
Route::get('/delete/supplier/{id}','SupplierController@delete')->name('delete.supplier');
Route::post('/store/supplier','SupplierController@store')->name('supplier.store');
Route::get('/edit/supplier/{id}','SupplierController@edit')->name('edit.supplier');
Route::post('/update/supplier/{id}','SupplierController@update')->name('supplier.update');
