<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\UserController;
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
Route::post('/addCity',[CityController::class,'addCity']);
Route::get('/city',[CityController::class,'DisplayCities'])->name('city');
Route::get('delete/{id}', [CityController::class , 'destroyCity'])->name('delete');
Route::post('/addPharmacy',[PharmacyController::class,'addPharmacy']);
Route::get('/pharmacy',[PharmacyController::class,'DisplayPharmacies'])->name('pharmacy');
Route::get('deletePhar/{id}', [PharmacyController::class , 'destroyPharmacy'])->name('deletePhar');
Route::post('UpdatePharmacy/{id}', [PharmacyController::class , 'updatePharmacy'])->name('UpdatePhar');
Route::get('/dashboard',[PharmacyController::class,'lastPharmacies'])->name('dashboard');
Route::post('/UpdateCity/{id}',[CityController::class,'updateCity'])->name('UpdateCity');
Route::get('/Profile',[UserController::class,'index'])->name('Profile');
Route::post('/EditChangePass',[UserController::class,'UpdatePassword'])->name('UpdatePass');
Route::post('/updateProfile',[UserController::class,'update'])->name('UpdateProfile');








Route::get('/invoice', function () {
    return view('invoice');
})->name('invoice');
