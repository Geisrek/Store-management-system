<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use App\Models\InvoiceCustomerItem;
use App\Models\WholesaleCustomers;
class customersController extends Controller
{
    function getCustomers(Request $req){
        $customers = Customers::all();
        return response()->json($customers);
    }
    function createCustomer(Request $req){
        $f_name=$req->first_name;
        $l_name=$req->last_name;
        $address=$req->address;
        $phone=$req->phone_number;
        $username=$req->username;
        $password=$req->password;
        if(!$f_name||!$l_name||!$address||!$phone||!$username||!$password){
            return response()->json(['message'=>'Please fill all the fields']);
        }
        else{
         Customers::create([
                'first_name'=>$f_name,
                'last_name'=>$l_name,
                'address'=>$address,
                'phone_number'=>$phone,
                'username'=>$username,
                'password'=>$password
            ]);
            return response()->json(['message'=>'Customer created successfully']);

        }

    }
    function getCustomerInvoices(Request $req){
    $username=$req->username;
if(!$username){
    return response()->json(['message'=>'Please provide username']);
}
else{
    $customer=Customers::where('username',$username)->first();
    if(!$customer){
        return response()->json(['message'=>'Customer not found']);
    }
    else{
        Customers::where('username',$username)->first();
        $customer_id=$customer->id;
       $invoices=InvoiceCustomerItem::where('customer_id',$customer_id)->get();
       return response()->json($invoices);
    }
    
}
    }
    function addWholesaleCustomer(Request $req){
        $customer_id=$req->customer_id;
        $priority_level=$req->priority_level;
        if(!$customer_id||!$priority_level){
            return response()->json(['message'=>'Please fill all the fields']);
        }
        else{
            WholesaleCustomers::create([
                'customer_id'=>$customer_id,
                'priority_level'=>$priority_level
            ]);
            return response()->json(['message'=>'Wholesale customer added successfully']);
        }
    }

}
