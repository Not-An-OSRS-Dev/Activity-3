<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Business\SecurityService;
use App\Models\UserModel;
use App\Models\CustomerModel;

class CustomerController extends Controller
{
    //Redirects to the order page with customer data
    public function index(Request $request)
    {   
        //Ensure data is valid
        $this->validateForm($request);
        
        return redirect('neworder')->with('firstName', $request->get('firstName'))
                                   ->with('lastName', $request->get('lastName'));
    }
    
    //Validation added for Activity 3
    private function validateForm(Request $request)
    {
        // Setup our data validation rules
        $rules = ['firstName' => 'Required | Between: 4, 10 | Alpha',
            'lastName' => 'Required | Between: 4, 10'];
        
        //Run Data Validation Rules
        $this->validate($request, $rules);
    }
}
