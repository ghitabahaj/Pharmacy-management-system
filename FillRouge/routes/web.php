<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;

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

Route::get('/', function () {
    return view('landingpage');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/addCity',[App\Http\Controllers\CityController::class,'addCity']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/pharmacy', function () {
    return view('pharmacy');
})->name('pharmacy');

Route::get('/Profile', function () {
    return view('UpdateProfile');
})->name('Profile');

Route::get('/city', function () {
    return view('city');
})->name('city');