<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


    public function GetRequests(){
        $user = Auth::user();
        $requests = $user->medicineRequests;
        $request_count = $requests->count();
        return view('visitor.visitorRequest', compact('requests', 'request_count'));  
    }
}
