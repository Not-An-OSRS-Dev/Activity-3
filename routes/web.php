<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route that will fire when we type in the 'login' in the URL
// This is just the name people will see on the outside
// as they type in the url.
Route::get('/login', function()
{
    //Test function, delete or comment out when needed
    echo("This is a test");
    
    // View 'loginView' has to be the name for the file in the views
    return view('loginView'); 
});

// When the data is posted from the login page with 
// action set to 'doLogin' it will come here
// then route the request to a function called index
// in the LoginController
Route::post('/doLogin', 'LoginController@index');

Route::get('/login2', function()
{
   return view('login2'); 
});

Route::post('/whoami', 'WhatsMyNameController@index');

Route::get('/askme', function() { return view('whoami'); });

//Routes to add a customer
Route::get('/customer', function()
{
   return view('customer'); 
});
Route::post('/addcustomer', 'CustomerController@index');

//--------------------------------------------------------
//Routes for add order
Route::get('/neworder', function()
{
   return view('order'); 
});
Route::post('/addorder', 'OrderController@index');