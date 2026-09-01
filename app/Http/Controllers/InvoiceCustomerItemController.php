<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvoiceCustomerItem;
class InvoiceCustomerItemController extends Controller
{
    function getAllInvoiceCustomerItems(Request $req){
        $items=InvoiceCustomerItem::all();
        if(!$items){
            return response()->json(['message'=>'No items found']);
        }
        else{
            return response()->json($items);
        }
    }
    function getInvoiceCustomerItems(Request $req){
        $invoice_id=$req->invoice_id;
        if(!$invoice_id){
            return response()->json(['message'=>'Please provide invoice_id']);
        }
        else{
            $items=InvoiceCustomerItem::where('invoice_id',$invoice_id)->get();
            if(!$items){
                return response()->json(['message'=>'No items found']);
            }
            else{
                return response()->json($items);
            }
        }
    }
    function createInvoiceCustomerItem(Request $req){
        $invoice_id=$req->invoice_id;
        $customer_id=$req->customer_id;
        $sn_b=$req->serial_number;
        $item_name=$req->item_name;
        $date=$req->date;
        $total_price=$req->total_price;
        $services=$req->services;
        $item_quantity=$req->item_quantity;
        if(!$invoice_id||!$customer_id||!$sn_b||!$item_name||!$total_price||!$item_quantity||!$services||!$date){
            return response()->json(['message'=>'Please fill all the fields']);
        }
        else{
            InvoiceCustomerItem::create([
                'invoice_id'=>$invoice_id,
                'customer_id'=>$customer_id,
                'i_name'=>$item_name,
                'total_price'=>$total_price,
                'item_quantity'=>$item_quantity,
                'services'=>$services,
                'date'=>$date
            ]);
            return response()->json(['message'=>'InvoiceCustomerItem created successfully']);
        }
    }
}
