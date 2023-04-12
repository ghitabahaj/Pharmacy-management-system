<?php

namespace App\Http\Controllers;

use App\Models\User;
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

        return view('super.superinvoice',compact('invoices','countInvoices'));
     }
    
}
