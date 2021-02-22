<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Business\SecurityService;
use App\Models\CustomerModel;

class OrderController extends Controller
{
    //To obtain an instance of the current HTTP request from a post
    public function index(Request $request)
    {  
        //Create a customer model to be inserted into the database
        $customerData = new CustomerModel($request->input('firstName'), $request->input('lastName'));
        
        //Bring in product name
        $product = $request->input('product');
      
        //Instantiate the business logic layer
        $serviceCustomer = new SecurityService();
        
        //Pass the customer and order data to the business layer
        $isValid = $serviceCustomer->addAllInformation($product, $customerData);
        
        //Echo success or failure
        if ($isValid) echo "Order Data Committed Successfully";
        else echo "Order Data Was Rolled Back";
        
        return view('order');
    }
    
//     public function addOrder(string $product, int $customerID)
//     {
//         $dao = new SecurityService();
        
//         $dao->addCustomer($product, $customerID);
//     }
}
