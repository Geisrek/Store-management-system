<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReceiptItems;
class receiptsItemsController extends Controller
{
    function getAllReceiptsItems(Request $req){
        $receiptsItems=ReceiptItems::all();
        if(!$receiptsItems){
            return response()->json(['message'=>'No receipts items found']);
        }
        else{
            return response()->json($receiptsItems);
        }
    }
    function getReceiptsItems(Request $req){
        $receipts_id=$req->receipts_id;
        if(!$receipts_id){
            return response()->json(['message'=>'Please provide receipts_id']);
        }
        else{
            $receiptsItems=ReceiptItems::where('receipts_id',$receipts_id)->get();
            if(!$receiptsItems){
                return response()->json(['message'=>'No receipts items found']);
            }
            else{
                return response()->json($receiptsItems);
            }
        }
    }
    function createReceiptsItems(Request $req){
        $receipts_id=$req->receipts_id;
        $item_id=$req->item_id;
        $item_name=$req->item_name;
        $date=$req->date;
        $quantity=$req->quantity;
        $discount=$req->discount;
        $sub_total=$req->sub_total;
        if(!$receipts_id||!$item_name||!$quantity||!$discount||!$date||!$item_id||!$sub_total){
            return response()->json(['message'=>'Please fill all the fields']);
        }
        else{
            ReceiptItems::create([
                'receipts_id'=>$receipts_id,
                'item_id'=>$item_id,
                'i_name'=>$item_name,
                'date'=>$date,
                'discount'=>$discount,
                'quantity'=>$quantity,
                'subtotal'=>$sub_total
            ]);
            return response()->json(['message'=>'Receipts item created successfully']);
        }
    }
}
