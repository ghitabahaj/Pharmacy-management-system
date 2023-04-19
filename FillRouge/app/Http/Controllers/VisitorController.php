<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Invoice;
use App\Models\Category;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisitorController extends Controller
{
    public function PharmaciesNight(){

        $pharmacies = Pharmacy::where('status', 'Day and Night')->get();
        $countPhar = Pharmacy::count();
        $countCities = City::count();
        $categories = Category::count();
        $userName = Auth::User()->name;
        $invoices = Invoice::where('clientName', 'Day and Night')->get();

        return view('visitor.visitordashboard',compact('pharmacies','countPhar','countCities','categories'));   

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
