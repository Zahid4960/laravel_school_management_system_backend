<?php

namespace App\Http\Controllers\User;

// services
use App\Services\User\UserTypeService;

// others
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserTypeController extends Controller
{
    private $userType;

    public function __construct(UserTypeService $userType)
    {
        $this->userType = $userType;
    }

    public function index()
    {
        $this->userType->index();
//        return 'zahid';
    }


    public function store(Request $request)
    {
        //
    }


    public function show(UserType $userType)
    {
        //
    }


    public function update(Request $request, UserType $userType)
    {
        //
    }


    public function destroy(UserType $userType)
    {
        //
    }
}
