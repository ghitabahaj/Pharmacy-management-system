<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Pharmacy;
use Illuminate\Http\Request;

class GiveRoleController extends Controller
{
    public function DispalyUsers(){
        
        $users = User::whereHas('role', function($query) {
            $query->where('name', '=', 'super')->orWhere('name', '=', 'visitor');
        })->get();
        $usersCount =User::whereHas('role', function($query) {
            $query->where('name', '=', 'super')->orWhere('name', '=', 'visitor');
        })->count();

        $roles = Role::all();
        $pharmacies = Pharmacy::all();

        return view('giveRole',compact('users','usersCount','roles','pharmacies'));
    }


    public function ChangeRole(Request $request, $id){
         
      $updateUser=User::find($id);
      $input = $request->all();
      $updateUser->fill($input);

      $updateUser->save();
    
       return redirect()->route('GiveRole');
    }

    public function destroyUser(User $User, $id)
    {
        User::destroy($id);
        return redirect()->route('GiveRole');
 
    }
}
