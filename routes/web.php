<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\MainControllerCars;
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

Route::get('/main', 'App\Http\Controllers\MainController@show_all')->name('main.show_all');
Route::get('/main/create', 'App\Http\Controllers\MainController@create')->name('main.create');

Route::post('/main', 'App\Http\Controllers\MainController@store')->name('main.store');
Route::get('/main/update', 'App\Http\Controllers\MainController@update')->name('main.update');
Route::get('/main/{client}', 'App\Http\Controllers\MainController@show')->name('main.show');
Route::get('/main/{client}/edit', 'App\Http\Controllers\MainController@edit')->name('main.edit');
Route::patch('/main/{client}', 'App\Http\Controllers\MainController@update')->name('main.update');
Route::post('/main/{client}/delete', 'App\Http\Controllers\MainController@destroy')->name('main.delete');

Route::get('/cars', 'App\Http\Controllers\MainControllerCars@show_all_cars')->name('main.show_all_cars');
Route::get('/all_cars', 'App\Http\Controllers\MainControllerCars@show_all_carss')->name('main.show_all_carss');
Route::post('/cars', 'App\Http\Controllers\MainControllerCars@storeCar')->name('main.storeCar');
Route::get('/create_cars', 'App\Http\Controllers\MainControllerCars@createCar')->name('main.createCar');
Route::get('/cars/{car}', 'App\Http\Controllers\MainControllerCars@showCar')->name('main.showCar');
Route::get('/cars/{car}/edit', 'App\Http\Controllers\MainControllerCars@editCar')->name('main.editCar');
Route::patch('/cars/{car}', 'App\Http\Controllers\MainControllerCars@updateCar')->name('main.updateCar');
Route::post('/{car}/delete', 'App\Http\Controllers\MainControllerCars@destroyCar')->name('main.deleteCar');

Route::get('/view','App\Http\Controllers\TestController@funct')->name('funct');
Route::get('/findName','App\Http\Controllers\TestController@findName');
