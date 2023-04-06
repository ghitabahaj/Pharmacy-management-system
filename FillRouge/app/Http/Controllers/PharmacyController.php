<?php

namespace App\Http\Controllers;

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
 
       return view('pharmacy',compact('pharmacies'));     
     
   }
   public function destroyPharmacy(Pharmacy $Pharmacy, $id)
   {
       Pharmacy::destroy($id);
       return redirect()->route('pharmacy');

   }



}
