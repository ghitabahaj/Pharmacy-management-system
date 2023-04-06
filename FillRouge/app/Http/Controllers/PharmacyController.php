<?php

namespace App\Http\Controllers;

use App\Models\Pharmacy;
use Illuminate\Http\Request;
use App\Models\City;

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
       return view('pharmacy',compact('pharmacies','cities'));     
     
   }
   public function destroyPharmacy(Pharmacy $Pharmacy, $id)
   {
       Pharmacy::destroy($id);
       return redirect()->route('pharmacy');

   }

   public function lastPharmacies(){
    $lastPhar = Pharmacy::latest()->take(10)->get();
    return view('dashboard',compact('pharmacies'));   
   }



}
