<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DropdownController;

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

Route::get('/', 'App\Http\Controllers\ClientController@show_all')->name('main.show_all');
Route::get('/create', 'App\Http\Controllers\ClientController@create')->name('main.create');

Route::post('/main', 'App\Http\Controllers\ClientController@store')->name('main.store');

Route::get('/main/{client}', 'App\Http\Controllers\ClientController@show')->name('main.show');
Route::get('/main/{client}/edit', 'App\Http\Controllers\ClientController@edit')->name('main.edit');
Route::patch('/main/{client}', 'App\Http\Controllers\ClientController@update')->name('main.update');
Route::post('/main/{client}/delete', 'App\Http\Controllers\ClientController@destroy')->name('main.delete');

Route::get('/cars', 'App\Http\Controllers\CarController@show_all_cars')->name('main.show_all_cars');
Route::post('/cars', 'App\Http\Controllers\CarController@storeCar')->name('main.storeCar');
Route::get('/all_cars', 'App\Http\Controllers\CarController@show_all_carss')->name('main.show_all_carss');
Route::get('/create_cars', 'App\Http\Controllers\CarController@createCar')->name('main.createCar');
Route::get('/cars/{car}', 'App\Http\Controllers\CarController@showCar')->name('main.showCar');
Route::get('/cars/{car}/edit', 'App\Http\Controllers\CarController@editCar')->name('main.editCar');
Route::patch('/cars/{car}', 'App\Http\Controllers\CarController@updateCar')->name('main.updateCar');
Route::post('/{car}/delete', 'App\Http\Controllers\CarController@destroyCar')->name('main.deleteCar');

Route::get('/view','App\Http\Controllers\DropdownController@funct')->name('funct');
Route::get('/findName','App\Http\Controllers\DropdownController@findName');


