<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Medicine;
use Illuminate\Http\Request;

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
}
