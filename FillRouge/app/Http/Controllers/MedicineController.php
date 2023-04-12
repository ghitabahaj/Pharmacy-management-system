<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Medicine;
use Illuminate\Http\Request;
use PHPOpenSourceSaver\JWTAuth\Contracts\Providers\Auth;

class MedicineController extends Controller
{
    public function addMedicine(Request $request){
        $pharmacy = new Medicine();
        $input = $request->all();
        $pharmacy->fill($input);
        $pharmacy->save();
        return redirect()->route('medicine');
    }

    public function DisplayMedicines(){
        $medicines = Medicine::all();
        $categories = Category::all();
        $countMed = Medicine::count();

       return view('super.supermedicine',compact('medicines','categories','countMed'));  
   }

   public function destroyMedicine(Medicine $Medicine, $id)
   {
       Medicine::destroy($id);
       return redirect()->route('medicine');

   }

   public function updateMedicine(Request $request,$id)
   {

      $updateMed = Medicine::find($id);
      $input = $request->all();
      $updateMed->fill($input);

      $updateMed->save();
    
       return redirect()->route('medicine');
   }

   public function lastMedicines(){
    $lastMed = Medicine::latest()->take(4)->get();
    $countMed= Medicine::count();
    return view('super.superdashboard',compact('lastMed','countMed'));   
   }
}
