<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use App\Models\Invoice;
use App\Models\Pharmacy;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
    public function addPharmacy(Request $request){
        $pharmacy = new Pharmacy();
        $input = $request->all();
        $pharmacy->fill($input);
        $pharmacy->save();
        return redirect()->route('pharmacy');
    }

    public function DisplayPharmacies(){

        $pharmacies=Pharmacy::all();
        $cities = City::all();
        $countPhar= Pharmacy::count();
       return view('pharmacy',compact('pharmacies','cities','countPhar'));       
   }


   public function destroyPharmacy(Pharmacy $Pharmacy, $id)
   {
       Pharmacy::destroy($id);
       return redirect()->route('pharmacy');

   }

   public function lastPharmacies(){
    $lastPhar = Pharmacy::latest()->take(4)->get();
    $countPhar= Pharmacy::count();
    $countCities= City::count();
    $superAdminCount = User::whereHas('role', function($query) {
        $query->where('name', '=', 'super');
    })->count();
    $invoicesCount = Invoice::count();
    $invoices = Invoice::all();
    return view('dashboard',compact('lastPhar','countPhar','countCities','superAdminCount','invoicesCount','invoices'));   
   }

   public function updatePharmacy(Request $request,$id)
   {

      $updatePhar=Pharmacy::find($id);
      $input = $request->all();
      $updatePhar->fill($input);

      $updatePhar->save();
    
       return redirect()->route('pharmacy');
   }


}
