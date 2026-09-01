<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receipts;
class receiptsController extends Controller
{
    function getAllReceipts(Request $req){
        $receipts=Receipts::all();
        if(!$receipts){
            return response()->json(['message'=>'No receipts found']);
        }
        else{
            return response()->json($receipts);
        }
    }
    function getReceipts(Request $req){
        $receipts_id=$req->receipts_id;
        if(!$receipts_id){
            return response()->json(['message'=>'Please provide receipts_id']);
        }
        else{
            $receipts=Receipts::where('id',$receipts_id)->get();
            if(!$receipts){
                return response()->json(['message'=>'No receipts found']);
            }
            else{
                return response()->json($receipts);
            }
        }
    }
    function createReceipts(Request $req){
        $total_price=$req->total_price;
        $discount=$req->discount;
        $TVA=$req->TVA;
        if(!$total_price||!$TVA||!$discount){
            return response()->json(['message'=>'Please fill all the fields']);
        }
        else{
            Receipts::create([
                'total_price'=>$total_price,
                'discount'=>$discount,
                'TVA'=>$TVA
            ]);
            return response()->json(['message'=>'Receipts created successfully']);
        }
    }
    function updateReceipts(Request $req){
        $receipts_id=$req->receipts_id;
        $receipts=Receipts::where('id',$receipts_id)->find();
        $allowed_fields=['total_price','discount','TVA'];
        $dataToUpdate=array_filter($req->only($allowed_fields));
        if(!$receipts){
            return response()->json(['message'=>'Receipts not found']);
        }
        else{
            if(empty($dataToUpdate)){
                return response()->json(['message'=>'No valid fields to update']);
            }
            $receipts->update($dataToUpdate);
            return response()->json(['message'=>'Receipts updated successfully']);
        }
    }
}
