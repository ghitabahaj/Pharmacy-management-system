<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatusController extends Controller
{
    public function ChangeStatus(Request $request , $id){

        $updatePhar=Pharmacy::find($id);
        $input = $request->all();
        $updatePhar->fill($input);
  
        $updatePhar->save();
      
         return redirect()->route('status');
    }

    public function DisplayMyPharmacy(){

     $userid = Auth::user()->id;
     $user = User::find($userid);
     $mypharmacy = $user->pharmacy;
     
     
     return view('super.status',compact('mypharmacy'));


    }
}
