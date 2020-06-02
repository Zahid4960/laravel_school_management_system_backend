<?php

namespace App\Http\Controllers\User;

// model
use App\User;

// requests
use App\Http\Requests\User\Authentication\UserRequest;

// others
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function registration(Request $request, UserRequest $user_req)
    {
    	// check password match or not
    	$password = $request->password;
    	$confirm_password = $request->confirm_password;

    	if($password != $confirm_password){
    		return response()->json([
    			'message' => 'Password doesn\'t match!'
    		]);
    	}

    	// check email exists or not
    	$email = $request->email;
    	$user_count = User::count();

    	if($user_count > 0){
    		$check_email = User::where('email', $email)->first();
    		if(!empty($check_email)){
    			return response()->json([
    				'message' => 'Email already exists!'
    			]);
    		}
    	}

    	// user save
    	$user = new User();
    	$user->email = $request->email;
    	$user->password_hash = Hash::make($request->password);
    	$user->password = $request->password;
    	$user->save();

    	return response()->json([
    		'status' => 'success',
    		'message' => 'User registered successfully!'
    	], 200);
    }
}
