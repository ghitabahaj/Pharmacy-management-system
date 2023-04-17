<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
                $medicine->name = $newMedicineName;
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
}

