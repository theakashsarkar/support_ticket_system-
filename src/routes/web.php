<?php

use http\Client\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

Route::get('/', function () {
    return view('welcome');
});


Route::post('/register', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'fname' => 'required',
        'lname' => 'required',
        'email' => 'required|email|unique:users,email',
        'number' => 'required|digits:11',
        'password' => 'required|min:6',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors()
        ], 422);
    }

    // Simulate user creation
    // User::create([...])

    return response()->json(['message' => 'Registered successfully']);
});
Route::get('/hello', function (){
    return 'Hello World';
});
