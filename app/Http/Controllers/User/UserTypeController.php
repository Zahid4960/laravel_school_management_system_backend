<?php

namespace App\Http\Controllers\User;

// services
use App\Services\ResponseService;
use App\Services\User\UserTypeService;

// requests
use App\Http\Requests\User\UserType\UserTypeSaveReq;

// others
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserTypeController extends Controller
{
    private $userType;
    private $response;

    public function __construct(UserTypeService $userType, ResponseService $response)
    {
        $this->userType = $userType;
        $this->response = $response;
    }

    public function index()
    {
       $userTypeLists = $this->userType->index();

        return $this->response->responder($userTypeLists);
    }


    public function store(Request $request, UserTypeSaveReq $userTypeSaveReq)
    {
        $data = $request->all();

        $isSaved = $this->userType->store($data);

        return $this->response->isSavedResponder($isSaved);
    }


    public function show($id)
    {
        $data = $this->userType->show($id);

        return $this->response->responder($data);
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
