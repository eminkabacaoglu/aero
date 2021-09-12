<?php

use App\Http\Controllers\AircraftController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\ManufacturerModelController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('home');
});

Route::resource('manufacturers',ManufacturerController::class);
Route::resource('models',ManufacturerModelController::class);
Route::resource('aircrafts',AircraftController::class);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
