<?php

namespace App\Http\Controllers;

use App\Models\User;
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

                return view('super.superinvoice',compact('invoices','countInvoices','medicaments'));
            }



            public function saveInvoice(Request $request)
            {
                
                $date = date('Y-m-d');


                $invoice = new Invoice;
                $invoice->date = $date;
                $invoice->save();

               
                $medicamentIds = $request->input('medicaments');
                $total = 0;
                foreach ($medicamentIds as $medicamentId) {
                    $medicament = Medicament::find($medicamentId);
                    $total += $medicament->price;
                    $invoice->medicaments()->attach($medicament);
                }

                $invoice->total = $total;
                $invoice->save();


                return back()->with('success', 'Invoice created successfully.');
            }

    
}
