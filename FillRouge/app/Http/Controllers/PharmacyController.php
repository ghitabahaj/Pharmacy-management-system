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

    return view('dashboard',compact('lastPhar','countPhar','countCities'));   
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
