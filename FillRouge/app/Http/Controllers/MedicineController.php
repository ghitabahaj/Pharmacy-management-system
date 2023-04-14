<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\User;
use App\Models\Category;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MedicineController extends Controller
{
    public function addMedicine(Request $request){
        $med = new Medicine();
        $input = $request->all();
        $demandeDay = new DateTime($request->expiration_date);


        $mydate = (new DateTime())->modify('+30 day');

        if ($demandeDay > $mydate && $request->quantity > 0) {
            $med->fill($input);
            $med->status = "In Stock";
            $med->save();
            $med->pharmacy()->attach($request->pharmacy_id);
            return redirect()->route('medicine')->with('success','Medicine created successfully');
        }else{
            return redirect()->route('medicine')->with('error','Medicine created failed Expiration date is not available');
        }
    }

    public function DisplayMedicines(){
        $medicines = Medicine::all();
        $categories = Category::all();
        $countMed = Medicine::count();
        $userid = Auth::user()->id;
        $user = User::find($userid);

       return view('super.supermedicine',compact('medicines','categories','countMed','user'));  
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
    $lastMed = Medicine::latest()->take(5)->get();
    $countMed= Medicine::count();
    $userid = Auth::user()->id;
    $user = User::find($userid);
    $mypharmacy = $user->pharmacy;
    $Employees = ($mypharmacy->employees);
    $invoices = ($user->invoices)->take(5);
    $countInvoices = ($user->invoices)->count();
    
    return view('super.superdashboard',compact('lastMed','countMed','Employees','invoices','countInvoices'));   
   }


}
