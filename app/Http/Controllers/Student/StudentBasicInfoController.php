<?php

namespace App\Http\Controllers\Student;

// models
use App\Models\Student\StudentBasicInfo;
use App\User;

// Requests
use App\Http\Requests\Student\StoreStudentBasicInfo;
use App\Http\Requests\Student\UpdateStudentBasicInfo;

// others
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

// services
use App\Services\Student\BasicInfoService;

class StudentBasicInfoController extends Controller
{
  protected $std_basic_info_service;

  public function __construct(BasicInfoService $std_basic_info_service)
  {
    $this->std_basic_info_service = $std_basic_info_service;
  } 

  public function index()
  {
    $list = $this->std_basic_info_service->index();

    if(!blank($list)){
      return response()->json(array(
        'status' => 'success',
        'message' => 'Data Found!',
        'data' => $list
      ));
    }
    return response()->json(array(
      'status' => 'success',
      'message' => 'No Data Found!',
      'data' => $list
    ));
  }


  public function store(StoreStudentBasicInfo $request)
  {
    $save_student_basic_info = $this->std_basic_info_service->store($request);

    if(!empty($save_student_basic_info)){
      return response()->json(array(
        'status' => 'success',
        'message' => 'Data Saved Successfully!',
      ));
    }
    
    return response()->json(array(
      'status' => 'Failed',
      'message' => 'Data Saved Failed!',
    ));
  }


  public function show($id)
  {
    $student_basic_info_by_id = $this->std_basic_info_service->show($id);

    if(!blank($student_basic_info_by_id)){
      return response()->json(array(
        'status' => 'success',
        'message' => 'Data Found',
        'data' => $student_basic_info_by_id
      ));
    }
    return response()->json(array(
      'status' => 'success',
      'message' => 'Data Not Found',
      'data' => []
    ));
  }


  public function update(UpdateStudentBasicInfo $request, $id)
  {
    $find_that_student_basic_info = StudentBasicInfo::find($id);

    if(empty($find_that_student_basic_info)){
      return response()->json(array(
        'status' => 'success',
        'message' => 'Data Not Found',
        'data' => []
      ));
    }

    $student_basic_info_data_from_request = $request->all();

    $update_student_basic_info = $find_that_student_basic_info->update($student_basic_info_data_from_request);

    if(!empty($update_student_basic_info)){
      return response()->json(array(
        'status' => 'success',
        'message' => 'Data Updated Successfully'
      ));
    }
    return response()->json(array(
      'status' => 'Failed',
      'message' => 'Data Failed To Update'
    ));
  }


  public function destroy($id)
  {
    $find_that_student_basic_info = StudentBasicInfo::find($id);

    if(empty($find_that_student_basic_info)){
      return response()->json(array(
        'status' => 'success',
        'message' => 'Data Not Found'
      ));
    }

    $delete_that_student_basic_info = $find_that_student_basic_info->delete();

    if($delete_that_student_basic_info){
      return response()->json(array(
        'status' => 'success',
        'message' => 'Data Deleted Successfully'
      ));
    }

    return response()->json(array(
      'status' => 'Failed',
      'message' => 'Data Failed To Delete'
    ));
  }
}
