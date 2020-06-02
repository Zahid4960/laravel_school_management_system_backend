<?php

namespace App\Http\Controllers\User;

// model
use App\User;

// requests
use App\Http\Requests\User\Authenticate\UserRequest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function registration(Request $request, UserRequest)
    {

    }
}
