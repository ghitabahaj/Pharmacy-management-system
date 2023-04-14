<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Pharmacy;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function PharmaciesNight(){

        $pharmacies = Pharmacy::where('status', 'Day and Night')->get();
        $countPhar = Pharmacy::count();
        $countCities = City::count();
        return view('visitor.visitordashboard',compact('pharmacies','countPhar','countCities'));   

    }

    public function PharmaciesMed(){

        $pharmacies = Pharmacy::all();
        $countPhar = Pharmacy::count();
        return view('visitor.visitorpharmacy',compact('pharmacies','countPhar'));   

    }
}
