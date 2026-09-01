<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StoredIn;
class StoredInController extends Controller
{
    function getStoredInItems(Request $req){
        $items = StoredIn::all();
        return response()->json($items);
    }
    function createStoredInItem(Request $req){
        $s_nb=$req->serial_number;
        $location=$req->location;
        $amount=$req->amount;
        if(!$s_nb||!$location||!$amount){
            return response()->json(['message'=>'Please fill all the fields']);
        }
        else{
            StoredIn::create([
                'serial_number'=>$s_nb,
                'location'=>$location,
                'amount'=>$amount
            ]);
            return response()->json(['message'=>'StoredIn item created successfully']);
        }
    }
    function updateStoredInItem(Request $req){
        $s_nb=$req->serial_number;
        $item=StoredIn::where('serial_number',$s_nb)->find();
        $allowed_fields=['location','amount'];
        $dataToUpdate=array_filter($req->only($allowed_fields));
        $id=$item->id;
        $item=StoredIn::find($id);
        if(!$item){
            return response()->json(['message'=>'StoredIn item not found']);
        }
        else{
            if(empty($dataToUpdate)){
                return response()->json(['message'=>'No valid fields to update']);
            }
            $item->update($dataToUpdate);
            return response()->json(['message'=>'StoredIn item updated successfully']);
        }
    }
   function updateStoredInItemAmount(Request $req){
        $s_nb=$req->serial_number;
        $item=StoredIn::where('serial_number',$s_nb)->find();
        $allowed_fields=['amount'];
        $dataToUpdate=array_filter($req->only($allowed_fields));
        $id=$item->id;
        $item=StoredIn::find($id);
        if(!$item){
            return response()->json(['message'=>'StoredIn item not found']);
        }
        else{
            if(empty($dataToUpdate)){
                return response()->json(['message'=>'No valid fields to update']);
            }
            $item->update($dataToUpdate);
            return response()->json(['message'=>'StoredIn item amount updated successfully']);
        }
    }
}
