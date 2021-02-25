<?php

namespace App\Http\Controllers\User;

// services
use App\Services\BaseService;
use App\Services\User\UserTypeService;

// others
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserTypeController extends Controller
{
    private $userType;
    private $base;

    public function __construct(UserTypeService $userType, BaseService $base)
    {
        $this->userType = $userType;
        $this->base = $base;
    }

    public function index()
    {
       $userTypeLists = $this->userType->index();

        return $this->base->responder($userTypeLists);
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $data = $this->userType->show($id);

        return $this->base->responder($data);
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
