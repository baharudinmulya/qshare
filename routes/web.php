<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
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

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' =>false,
]);

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout1');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(CustomerController::class)->group( function(){
    Route::get('/datacust/index', 'index')->name('indexDataCustomer');
    Route::get('/datacust/show', 'show')->name('showDataCustomer');
    Route::get('/datacust/edit', 'edit')->name('editDataCustomer');
    Route::post('/datacust/post', 'store')->name('storeDataCustomer');
    Route::post('/datacust/upd/{id}', 'update')->name('updateDataCustomer');
    Route::post('/datacust/delete/{id}', 'destroy')->name('deleteDataCustomer');

});
