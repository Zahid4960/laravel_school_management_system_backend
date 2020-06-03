<?php

namespace App\Http\Controllers\User;

// models
use App\User;

// requests
use App\Http\Requests\User\Authentication\UserRequest;

// others
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function passwordReset(Request $request, UserRequest $user_req)
    {
    	// check password match or not
    	$password = $request->password;
    	$confirm_password = $request->confirm_password;

    	if($password != $confirm_password){
    		return response()->json([
    			'message' => 'Password doesn\'t match!'
    		]);
    	}

    	// find user who's password need to be changed
    	$find_user = User::where('email', $request->email)->first();
    	if(!empty($find_user)){
    		$data = [
    			'password_hash' => Hash::make($request->password),
    			'password' => $request->password
    		];

    		$reset_password = $find_user->update($data);

    		if($reset_password){
    			return response()->json([
    				'status' => 'success',
    				'message' => 'Password successfully reset!'
    			], 200);
    		}
    	}

    	return response()->json([
    		'status' => 'failed',
    		'message' => 'Failed to reset password!'
    	]);
    }
}
