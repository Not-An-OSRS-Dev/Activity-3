<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Business\SecurityService;
use App\Models\UserModel;

class LoginController extends Controller
{
    //To obtain an instance of the current HTTP request from a post
    public function index(Request $request)
    {
        //Added for Activity 3
        // Test the form variables being passed in
        $this->validateForm($request);
        
        //Create a userModel with username and password
        $user = new UserModel($request()->get('user_name'), request()->get('password'));
        
        //Instantiate the Business Layer
        $serviceLogin = new SecurityService();
        
        //Pass the credentials to the business layer
        // and determine which view to display
        if ($serviceLogin->login($user))
        {
            $data = ['model' => $user];
            return view('loginPassed2')->with($data);
        }
        
        return view('loginFailed');
    }
    
//     //Validation added for Activity 3
//     private function validateForm(Request $request)
//     {
//         // Setup our data validation rules
//         $rules = ['user_name' => 'Required | Between: 4, 10 | Alpha', 
//         'password' => 'Required | Between: 4, 10'];
        
//         //Run Data Validation Rules
//         $this->validate($request, $rules);
//     }
}
