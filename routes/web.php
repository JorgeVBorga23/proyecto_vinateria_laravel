<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


    Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
    Route::get('/about', 'App\Http\Controllers\HomeController@about')->name("home.about");
    
    Route::get('/licor', 'App\Http\Controllers\LicorController@index')->name("licor.index");
    Route::get('/licor/{id}', 'App\Http\Controllers\LicorController@show')->name("licor.show");
    
    
    Route::get('/venta', 'App\Http\Controllers\VentaController@index')->name("venta.index");
    Route::get('/venta/{id}', 'App\Http\Controllers\VentaController@show')->name("venta.show");
    
    Route::post('/venta/store', 'App\Http\Controllers\LicorController@store')->name("venta.store");

    Auth::routes();


Route::middleware('admin')->group(function () {
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.home.index");
    
    
    Route::get('/admin/licor', 'App\Http\Controllers\Admin\AdminLicorController@index')->name("admin.licor.index");
    Route::delete('/admin/licor/{id}/delete', 'App\Http\Controllers\Admin\AdminLicorController@delete')->name("admin.licor.delete");
    Route::post('/admin/licor/store', 'App\Http\Controllers\Admin\AdminLicorController@store')->name("admin.licor.store");
    Route::get('/admin/licor/{id}/edit', 'App\Http\Controllers\Admin\AdminLicorController@edit')->name("admin.licor.edit");
    Route::put('/admin/licor/{id}/update', 'App\Http\Controllers\Admin\AdminLicorController@update')->name("admin.licor.update");
    
    
    Route::get('/admin/categoria', 'App\Http\Controllers\Admin\AdminCategoriaController@index')->name("admin.categoria.index");
    Route::post('/admin/categoria/store', 'App\Http\Controllers\Admin\AdminCategoriaController@store')->name("admin.categoria.store");
    Route::delete('/admin/categoria/{id}/delete', 'App\Http\Controllers\Admin\AdminCategoriaController@delete')->name("admin.categoria.delete");
    Route::get('/admin/categoria/{id}/edit', 'App\Http\Controllers\Admin\AdminCategoriaController@edit')->name("admin.categoria.edit");
    Route::put('/admin/categoria/{id}/update', 'App\Http\Controllers\Admin\AdminCategoriaController@update')->name("admin.categoria.update");

    Route::get('/admin/venta', 'App\Http\Controllers\Admin\AdminVentaController@index')->name("admin.venta.index");
    Route::post('/admin/venta/store', 'App\Http\Controllers\Admin\AdminVentaController@store')->name("admin.venta.store");
    Route::delete('/admin/venta/{id}/delete', 'App\Http\Controllers\Admin\AdminVentaController@delete')->name("admin.venta.delete");
    Route::get('/admin/venta/{id}/edit', 'App\Http\Controllers\Admin\AdminVentaController@edit')->name("admin.venta.edit");
    Route::put('/admin/venta/{id}/update', 'App\Http\Controllers\Admin\AdminVentaController@update')->name("admin.venta.update");
    
   
    
    
});