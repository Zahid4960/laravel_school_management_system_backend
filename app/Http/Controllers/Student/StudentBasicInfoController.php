<?php

namespace App\Http\Controllers\Student;
// Models
use App\Models\Student\StudentBasicInfo;
use App\User;

// Request
use App\Http\Requests\Student\StudentBasicInfo\StoreRequest;


// others
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentBasicInfoController extends Controller
{

    public function index()
    {
      return 'hit';
    }


    public function store(StoreRequest $request)
    {
      $username = $request->first_name."".rand(1, 100);
      
      $user = [

        'username' => $username,
        'password' => $username
      ];

      $user_save = User::create($user);

      if(!empty($user_save)){

        $last_user = User::all()->last();
        $last_user_id = $last_user->id;

        $student_basic_info = [

          'first_name' => $stu_request->first_name,
          'last_name' => $stu_request->last_name,
          'email' => $stu_request->email,
          'mobile' => $stu_request->mobile,
          'dop' => $stu_request->dop,
          'sex' => $stu_request->sex,
          'previous_school' => $stu_request->previous_school,
          'admission_year' => $stu_request->admission_year,
          'admission_class' => $stu_request->admission_class,
          'admission_reason' => $stu_request->admission_reason,
          'user_id' => $last_user_id
        ];

        $student_basic_info_save = StudentBasicInfo::create($student_basic_info);

        if(!empty($student_basic_info_save)){
          return response()->json(array(
            'status' => 'success',
            'message' => 'Data Saved Successfully!'
          ));
        }

        return response()->json(array(
          'status' => 'Failed',
          'message' => 'Data Failed To Saved!'
        ));
      }
    }


    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
