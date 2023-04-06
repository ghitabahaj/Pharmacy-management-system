<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\PharmacyController;

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
Route::get('/city',[App\Http\Controllers\CityController::class,'DisplayCities'])->name('city');
Route::get('delete/{id}', [CityController::class , 'destroyCity'])->name('delete');
Route::post('/addPharmacy',[PharmacyController::class,'addPharmacy']);
Route::get('/pharmacy',[PharmacyController::class,'DisplayPharmacies'])->name('pharmacy');
Route::get('deletePhar/{id}', [PharmacyController::class , 'destroyPharmacy'])->name('deletePhar');
Route::get('/dashboard',[PharmacyController::class,'lastPharmacies'])->name('dashboard');



Route::get('/Profile', function () {
    return view('UpdateProfile');
})->name('Profile');


Route::get('/invoice', function () {
    return view('invoice');
})->name('invoice');
