<?php
namespace App\Http\Controllers;


use App\Http\Requests\UserTypeReq;
use App\Services\UserTypeService;
use http\Env\Response;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class UserTypeController extends Controller
{
    private $userType;

    public function __construct(UserTypeService $userType )
    {
        $this->userType = $userType;
    }

    public function index(UserTypeService $userType)
    {
        try {
            $lists = $this->userType->index();
            if(!blank($lists)){
                return response()->json([ 'status' => 'success', 'msg' => 'User type data found!!!', 'data' => $lists ]);
            }
            return response()->json([ 'status' => 'success', 'msg' => 'User type not data found!!!', 'data' => $lists ]);
        }catch (Exception $ex){
            return response()->json([ 'status' => 'error', 'msg' => 'Exception appears!!!']);
        }
    }

    public function store(Request $request, UserTypeReq $userTypeReq)
    {
        try {
            $data = $this->userType->store($request->all());
            return response()->json([ 'status' => 'success', 'msg' => 'User type saved!!!', 'data' => $data]);
        }catch(\Exception $ex){
            return response()->json([ 'status' => 'error', 'msg' => 'exception appear user type failed to save!!!']);
        }
    }

    public function show($id)
    {
        try {
            $data = $this->userType->show($id);
            if($data == null){
                return response()->json([ 'status' => 'success', 'msg' => 'User type not found!!!', 'data' => $data ]);
            }
            return response()->json([ 'status' => 'success', 'msg' => 'User type found!!!', 'data' => $data ]);
        }catch (\Exception $ex){
            return response()->json([ 'status' => 'error', 'msg' => 'Exception appears!!!']);
        }

    }

    public function update(Request $request, $id)
    {
        try {
            $data = $this->userType->update($request->all(), $id);
            if($data){
                return response()->json([ 'status' => 'success', 'User type updated!!!', 'data' => $data ]);
            }
        }catch(\Exception $ex){
            return response()->json([ 'status' => 'error', 'Exception appear user type failed to update!!!']);
        }
    }

    public function destroy($id)
    {
        try {
            if($this->userType->destroy($id)){
                return response()->json([ 'status' => 'success', 'msg' => 'User type data deleted!!!' ]);
            }
        }catch(\Exception $ex){
            return response()->json([ 'status' => 'error', 'msg' => 'Exception appear user type failed to delete!!!']);
        }
    }
}
