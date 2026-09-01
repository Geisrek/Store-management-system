<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalesMan;
class SalesManController extends Controller
{
    function getSalesMen(Request $req){
        $salesmen = SalesMan::all();
        return response()->json($salesmen);
    }
    function getSalesManWithBrand(Request $req){
        $username=$req->username;
        if(!$username){
            return response()->json(['message'=>'Please provide username']);
        }
        else{
            $salesman=SalesMan::where('username',$username)->join('brands', 'sales_man.works_in', '=', 'brands.id')->first();
            if(!$salesman){
                return response()->json(['message'=>'SalesMan not found']);
            }
            else{
                return response()->json($salesman);
            }
        }
    }
    function createSalesMan(Request $req){
        
        $first_name=$req->first_name;
        $last_name=$req->last_name;
        $phone_number=$req->phone_number;
        $username=$req->username;
        $password=$req->password;
        $works_in=$req->works_in;
        if(!$first_name||!$last_name||!$phone_number||!$username||!$password||!$works_in){
            return response()->json(['message'=>'Please fill all the fields']);
        }
        else{
            SalesMan::create([
                'first_name'=>$first_name,
                'last_name'=>$last_name,
                'username'=>$username,
                'phone_number'=>$phone_number,
                'password'=>$password,
                'works_in'=>$works_in
            ]);
            return response()->json(['message'=>'SalesMan created successfully']);
        }
    }
}
