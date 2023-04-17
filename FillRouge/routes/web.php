<?php

use App\Models\Medicine;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GiveRoleController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\MedicineRequestController;

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

Route::middleware(['auth'])->group(function (){

// admin Routes
Route::middleware(['isAdmin'])->group(function(){
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
    Route::post('ChangeRole/{id}', [GiveRoleController::class , 'ChangeRole'])->name('ChangeRole');
    Route::get('deleteUser/{id}', [GiveRoleController::class , 'destroyUser'])->name('deleteUser');
    Route::get('/GiveRole',[GiveRoleController::class,'DispalyUsers'])->name('GiveRole');
    Route::get('/invoiceAdmin',[InvoiceController::class,'InvoicesAdmin'])->name('invoiceAdmin');
});


// super admin routes

Route::middleware(['isSuper'])->group(function(){
    Route::get('/category',[CategoryController::class,'DisplayCategories'])->name('category');
    Route::post('/addCategory',[CategoryController::class,'addCategory']);
    Route::get('deleteCategory/{id}', [CategoryController::class , 'destroyCat'])->name('deleteCategory');
    Route::post('/UpdateCategory/{id}',[CategoryController::class,'updateCategory'])->name('UpdateCategory');
    Route::get('/medicine',[MedicineController::class,'DisplayMedicines'])->name('medicine');
    Route::post('/addMedicine',[MedicineController::class,'addMedicine']);
    Route::get('deleteMedicine/{id}', [MedicineController::class , 'destroyMedicine'])->name('destroyMedicine');
    Route::post('updateMedicine/{id}', [MedicineController::class , 'updateMedicine'])->name('updateMedicine');
    Route::get('/superdashboard',[MedicineController::class,'lastMedicines'])->name('superdashboard');
    Route::get('/Profile',[UserController::class,'index'])->name('Profile');
    Route::post('/EditChangePass',[UserController::class,'UpdatePassword'])->name('UpdatePass');
    Route::post('/updateProfile',[UserController::class,'update'])->name('UpdateProfile');
    Route::get('/status',[StatusController::class,'DisplayMyPharmacy'])->name('status');
    Route::post('ChangeStatus/{id}', [StatusController::class , 'ChangeStatus'])->name('ChangeStatus');
    Route::get('/invoice',[InvoiceController::class,'DisplayInvoices'])->name('invoice');
    Route::post('/CreateInvoice',[InvoiceController::class,'saveInvoice'])->name('saveInvoice');
    Route::get('deleteInvoice/{id}', [InvoiceController::class , 'DestroyInvoice'])->name('deleteInvoice');
    Route::get('/showRequest',[MedicineRequestController::class,'DisplayRequests'])->name('showRequest');


});

// visitor routes

Route::middleware(['isVisitor'])->group(function(){
    Route::get('/visitordashboard',[VisitorController::class,'PharmaciesNight'])->name('visitordashboard');
    Route::get('/Profile',[UserController::class,'index'])->name('Profile');
    Route::post('/EditChangePass',[UserController::class,'UpdatePassword'])->name('UpdatePass');
    Route::post('/updateProfile',[UserController::class,'update'])->name('UpdateProfile');
    Route::get('/viewPharmacy',[VisitorController::class,'PharmaciesMed'])->name('viewPharmacy');
    Route::post('/SendRequest',[MedicineRequestController::class,'storeRequest'])->name('sendRequest');
    Route::get('/viewRequest',[VisitorController::class,'GetRequests'])->name('viewRequest');
});
   

  
    
   


});







