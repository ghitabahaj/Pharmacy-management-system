<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Models\Invoice;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
            public function DisplayInvoices(){
                
                $userid = Auth::user()->id;
                $user = User::find($userid);
                $mypharmacy = $user->pharmacy;
                $countInvoices = ($user->invoices)->count();
                $invoices = $user->invoices;
                $medicaments = Medicine::all();


                return view('super.superinvoice',compact('invoices','countInvoices','medicaments','mypharmacy'));
            }



            public function saveInvoice(Request $request)
            {

                $validator = Validator::make($request->all(), [
                    'clientName' => 'required|max:255',
                    'medicaments.*' => 'required|exists:medicines,id',
                    'quantities.*' => 'required|integer|min:1',
                ]);
                
                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                }

                $quantities = $request->input('quantities', []);
                $medicamentIds = $request->input('medicaments', []);
                $medicines = Medicine::whereIn('id', $medicamentIds)->get();
                $total = 0;
                
                foreach($medicines as $medicine){
                    $quantitySold = 0;
                    $index = array_search($medicine->id, $medicamentIds);
                    if($index !== false){
                        $quantitySold = $quantities[$index];
                    }
                    $quantity = $medicine->quantity - $quantitySold;
                    if($quantity < 0){
                        return back()->with('error', 'The quantity sold for '.$medicine->label.' exceeds the available quantity.');
                    }
                    $medicine->quantity = $quantity;
                    $medicine->save();
                    $total += $medicine->price * $quantitySold;
                }
                
                $userId = Auth::user()->id;
                $date = date('Y-m-d');
                $invoice = new Invoice;
                $invoice->date = $date;
                $invoice->user_id = $userId ;
                $invoice->clientName = $request->input('clientName');
                $invoice->total = $total;
                $invoice->save();
                $invoice->Medicine()->attach($medicamentIds);

                
                return back()->with('success', 'Invoice created successfully.');

            }

             public function DestroyInvoice($id){

                Invoice::destroy($id);
                return redirect()->route('invoice')->with('success', 'Invoice deleted successfully.');
            
            }


            public function InvoicesAdmin(){

                $invoices = Invoice::all();
                $counter = Invoice::count();
                return view('invoice',compact('invoices','counter'));
            }

    
}
