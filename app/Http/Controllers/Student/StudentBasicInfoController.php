<?php

namespace App\Http\Controllers\Student;

// models
use App\Models\Student\StudentBasicInfo;
use App\User;

// Requests
use App\Http\Requests\Student\StoreStudentBasicInfo;
use App\Http\Requests\Student\UpdateStudentBasicInfo;

// Resources
use App\Http\Resources\Student\StudentBasicInfoResource;

// others
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class StudentBasicInfoController extends Controller
{

    public function index()
    {
        $list = (new StudentBasicInfo)->newQuery();

        $list->select([
          'student_basic_infos.id as id',
          'student_basic_infos.first_name as first_name',
          'student_basic_infos.last_name as last_name',
          'student_basic_infos.email as email',
          'student_basic_infos.mobile as mobile',
          'student_basic_infos.dop as dop',
          'student_basic_infos.gender as gender',
          'student_basic_infos.previous_school as previous_school',
          'student_basic_infos.admission_year as admission_year',
          'student_basic_infos.admission_class as admission_class',
          'student_basic_infos.admission_reason as admission_reason',
          'student_basic_infos.user_id as user_id',
          'student_basic_infos.created_by as created_by',
          'student_basic_infos.active as active'
        ]);

        $student_basic_info = $list->get();

        if(count($student_basic_info) > 0){
          return response()->json(array(
            'status' => 'success',
            'message' => 'Data Found!',
            'data' => StudentBasicInfoResource::collection($student_basic_info)
          ));
        }
        return response()->json(array(
          'status' => 'success',
          'message' => 'No Data Found!',
          'data' => []
        ));
    }


    public function store(StoreStudentBasicInfo $request)
    {
      $user_name = $request->first_name."".rand(1, 10);
      $user = [
          'username' => $user_name,
          'password' =>  $user_name,
          'user_type' => 1
        ];

        $save_user = User::create($user);

        if(!empty($save_user)){
          $user_id = User::all()->last();

          $student_basic_info = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'dop' => $request->dop,
            'gender' => $request->gender,
            'previous_school' => $request->previous_school,
            'admission_year' => $request->admission_year,
            'admission_class' => $request->admission_class,
            'admission_reason' => $request->admission_reason,
            'user_id' => $user_id->id
          ];

          $save_student_basic_info = StudentBasicInfo::create($student_basic_info);

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
        return response()->json(array(
          'status' => 'Failed',
          'message' => 'Data Saved Failed!',
        ));
    }


    public function show($id)
    {
        $student_basic_info_list = StudentBasicInfo::find($id);

        if(!empty($student_basic_info_list)){
          return response()->json(array(
            'status' => 'success',
            'message' => 'Data Found',
            'data' => $student_basic_info_list
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
