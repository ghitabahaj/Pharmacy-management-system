<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
      $data = Auth::user();


      return view('UpdateProfile',compact('data'));
    }


    public function update(Request $request)
    {
    $user=auth()->user();

    $user->update([
        'name'=>$request->name,
        'email'=>$request->email,
    ]);

    return redirect()->route('Profile')->with('success','Profile successfully updated ');
    }
  public function UpdatePassword(Request $request){

        $request->validate([
            'old_password'=>'required|min:6|max:50',
            'new_password'=>'required|min:6|max:50',
            'confirm_password'=>'required|same:new_password'
        ]);

        $current_user=auth()->user();
   
        if(Hash::check($request->old_password,$current_user->password)){
            $current_user->update([
              'password'=>bcrypt($request->new_password)
            ]);
            return redirect()->route('Profile')->with('success','Updated successfully');
        }else{
            return redirect()->route('Profile')->with('error','Old password does not matched.');
        }

    }


}
