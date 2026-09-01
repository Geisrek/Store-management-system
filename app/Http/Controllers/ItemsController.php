<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Items;
class ItemsController extends Controller
{
    function getItems(Request $req){
        $items = Items::all();
        return response()->json($items);
    }
    function createItem(Request $req){
        $s_nb=$req->serial_number;
        $barcode=$req->barcode;
        $name=$req->name;
        $type=$req->type;
        $color=$req->color;
        $height=$req->height;
        $width=$req->width;
        $price=$req->price;
        $brand_id=$req->brand_id;
        if(!$name||!$height||!$price||!$width||!$brand_id||!$color||!$type||!$s_nb||!$barcode){
            return response()->json(['message'=>'Please fill all the fields']);
        }
        else{
            Items::create([
                'serial_number'=>$s_nb,
                'name'=>$name,
                'type'=>$type,
                'color'=>$color,
                'height'=>$height,
                'width'=>$width,
                'price'=>$price,
                'brand_id'=>$brand_id,
                'barcode'=>$barcode
            ]);
            return response()->json(['message'=>'Item created successfully']);
        }
    }
    function updateItem(Request $req){
        $s_nb=$req->serial_number;
        $item=Items::where('serial_number',$s_nb)->find();
        $allowed_fields=['name','type','color','height','width','price','brand_id','barcode'];
        $dataToUpdate=array_filter($req->only($allowed_fields));
        $id=$item->id;
        $item=Items::find($id);
        if(!$item){
            return response()->json(['message'=>'Item not found']);
        }
        else{
            if(empty($dataToUpdate)){
                return response()->json(['message'=>'No valid fields to update']);
            }
            $item->update($dataToUpdate);
            return response()->json(['message'=>'Item updated successfully']);
        }
    }
    function deleteItem(Request $req){
        $s_nb=$req->serial_number;
        $item=Items::where('serial_number',$s_nb)->first();
        if(!$item){
            return response()->json(['message'=>'Item not found']);
        }
        else{
            $item->delete();
            return response()->json(['message'=>'Item deleted successfully']);
        }
    }
}
