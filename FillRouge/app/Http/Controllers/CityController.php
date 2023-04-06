<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function addCity(Request $request){
        $city = new City();
        $input = $request->all();
        $city->fill($input);
        $city->save();
        return redirect()->route('city'); 
    } 

    public function DisplayCities(){

        $cities=City::all();
        $countCities= City::count();
 
       return view('city',compact('cities','countCities'));     
     
   }
   public function destroyCity(City $City, $id)
   {
       City::destroy($id);
       return redirect()->route('city');
   }

}
