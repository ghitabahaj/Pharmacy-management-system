<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;
use App\Models\MedicineRequest;
use Illuminate\Support\Facades\Auth;

class MedicineRequestController extends Controller
{
 
        public function storeRequest(Request $request)
        {
            $request->validate([
                'visitor_id' => 'required',
                'pharmacy_id' => 'required',
                'quantity' => 'required|numeric',
            ]);
    
            $medicineId = $request->input('medicine_id');
            $newMedicineName = $request->input('new_medicine_name');
    
            if (!$medicineId && $newMedicineName) {
                // Create a new medicine record
                $medicine = new Medicine;
                $medicine->label = $newMedicineName;
                $medicine->save();
    
                $medicineId = $medicine->id;
            }
    
            // Create a new medicine request record
            $medicineRequest = new MedicineRequest;
            $medicineRequest->visitor_id = $request->input('visitor_id');
            $medicineRequest->pharmacy_id = $request->input('pharmacy_id');
            $medicineRequest->medicine_id = $medicineId;
            $medicineRequest->quantity = $request->input('quantity');
            $medicineRequest->save();
    
            return redirect()->back()->with('success', 'Medicine request sent successfully!');
        }

        public function DisplayRequests(){
            $user = Auth::user();
            $mypharmacy = $user->pharmacy;
            $requests = $mypharmacy->medicineRequests;
            $request_count = $requests->count();
            $unread_requests_count = $mypharmacy->medicineRequests()->where('is_read', false)->count();
            return view('super.superRequests', compact('requests', 'request_count','unread_requests_count'));  
        }
}

