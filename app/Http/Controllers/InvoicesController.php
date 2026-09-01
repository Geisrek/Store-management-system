<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoices;
class InvoicesController extends Controller
{
    function getInvoices(Request $req){
        $invoices = Invoices::all();
        return response()->json($invoices);
    }
    function createInvoice(Request $req){
        $total_price=$req->total_price;
        $paid=$req->paid;
        $owes=$req->owes;
        if(!$total_price||!$paid||!$owes){
            return response()->json(['message'=>'Please fill all the fields']);
        }
        else{
            Invoices::create([
                'total_price'=>$total_price,
                'paid'=>$paid,
                'owes'=>$owes
            ]);
            return response()->json(['message'=>'Invoice created successfully']);
        }
    }
}
