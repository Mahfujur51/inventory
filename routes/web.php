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


/*Route for Supplier*/
Route::get('/suppliers','SupplierController@index')->name('supplier.index');
Route::get('/add/supplier','SupplierController@add')->name('supplier.add');
Route::get('/view/supplier/{id}','SupplierController@view')->name('view.supplier');
Route::get('/delete/supplier/{id}','SupplierController@delete')->name('delete.supplier');
Route::post('/store/supplier','SupplierController@store')->name('supplier.store');
Route::get('/edit/supplier/{id}','SupplierController@edit')->name('edit.supplier');
Route::post('/update/supplier/{id}','SupplierController@update')->name('supplier.update');

/*Route for Salary*/
Route::get('/salaries','SalaryController@index')->name('salary.index');
Route::get('/add/salary','SalaryController@add')->name('salary.add');
Route::get('/view/salary/{id}','SalaryController@view')->name('view.salary');
Route::get('/delete/salary/{id}','SalaryController@delete')->name('delete.salary');
Route::post('/store/salary','SalaryController@store')->name('salary.store');
Route::get('/edit/salary/{id}','SalaryController@edit')->name('edit.salary');
Route::post('/update/salary/{id}','SalaryController@update')->name('salary.update');
Route::get('/pay_salary/index','SalaryController@pay_salary')->name('pay_salary.index');

/*Route for Category*/
Route::get('/category','CategoryController@index')->name('category.index');
Route::get('/add/category','CategoryController@add')->name('category.add');
Route::get('/view/category/{id}','CategoryController@view')->name('view.category');
Route::get('/delete/category/{id}','CategoryController@delete')->name('delete.category');
Route::post('/store/category','CategoryController@store')->name('category.store');
Route::get('/edit/category/{id}','CategoryController@edit')->name('edit.category');
Route::post('/update/category/{id}','CategoryController@update')->name('category.update');

/*Route for Product*/
Route::get('/categories','ProductController@index')->name('product.index');
Route::get('/add/product','ProductController@add')->name('product.add');
Route::get('/view/product/{id}','ProductController@view')->name('view.product');
Route::get('/delete/product/{id}','ProductController@delete')->name('delete.product');
Route::post('/store/product','ProductController@store')->name('product.store');
Route::get('/edit/product/{id}','ProductController@edit')->name('edit.product');
Route::post('/update/product/{id}','ProductController@update')->name('product.update');
Route::get('/product/export/', 'ProductController@export')->name('export');
Route::get('/product/import/excel', 'ProductController@import_excel')->name('import.excel');
Route::post('/product/import', 'ProductController@import')->name('insert.import');


/*Route for Expanse*/
Route::get('/expanse','ExpanseController@index')->name('expanse.index');
Route::get('/add/expanse','ExpanseController@add')->name('expanse.add');
Route::get('/view/expanse/{id}','ExpanseController@view')->name('view.expanse');
Route::get('/delete/expanse/{id}','ExpanseController@delete')->name('delete.expanse');
Route::post('/store/expanse','ExpanseController@store')->name('expanse.store');
Route::get('/edit/expanse/{id}','ExpanseController@edit')->name('edit.expanse');
Route::get('/today/expanse/','ExpanseController@today')->name('today.expanse');
Route::get('/month/expanse/','ExpanseController@month')->name('month.expanse');
Route::get('/year/expanse/','ExpanseController@year')->name('year.expanse');
Route::post('/update/expanse/{id}','ExpanseController@update')->name('expanse.update');

//Route for Attendace
Route::get('/attendance','AttendenceController@index')->name('attendance.index');
Route::get('/edit/attendance/{date}','AttendenceController@edit_attendance')->name('edit.attendance');
Route::get('/add/attendance','AttendenceController@add')->name('attendance.add');
Route::post('/add/attendance','AttendenceController@attendance')->name('insert.attendance');
Route::post('/update/attendance','AttendenceController@update')->name('update.attendance');


//pos system
Route::get('/pos','PosController@pos')->name('pos');
Route::post('/customer/store/pos','PosController@store')->name('customer.store.pos');
Route::post('/add_cart','PosController@addCart')->name('add_cart');
Route::post('/update_cart/{rowId}','PosController@updateCart')->name('cart_update');
Route::get('/cart_remove/{rowId}','PosController@removeCart')->name('cart.remove');
Route::post('/invoice','PosController@invoice')->name('invoice');
Route::post('/final-invoice','PosController@finalInvoice')->name('final.invoice');
Route::get('/generate-pdf/{id}','PosController@pdf_generate')->name('pdf-generate');
