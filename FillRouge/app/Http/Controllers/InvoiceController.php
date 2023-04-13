<?php

namespace App\Http\Controllers;

use App\Models\User;
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
                return view('super.superinvoice',compact('invoices','countInvoices','medicaments'));
            }



            public function saveInvoice(Request $request)
            {
               
                $userId = Auth::user()->id;
                $date = date('Y-m-d');
                $invoice = new Invoice;
                $invoice->date = $date;
                $invoice->user_id = $userId ;
                $invoice->clientName = $request->input('clientName');
                $medicamentIds = $request->input('medicaments', []);
                $medicines = Medicine::whereIn('id', $medicamentIds)->get();
                $total = $medicines->sum('price');
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
                return view('invoice',compact('invoices'));
            }

    
}
