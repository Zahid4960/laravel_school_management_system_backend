<?php

namespace App\Http\Controllers\Student;
// Models
use App\Models\Student\StudentBasicInfo;
use App\User;

// others
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentBasicInfoController extends Controller
{

    public function index()
    {
      return 'hit';
    }


    public function store(Request $request)
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

          'first_name' => $request->first_name,
          'last_name' => $request->last_name,
          'email' => $request->email,
          'mobile' => $request->mobile,
          'dop' => $request->dop,
          'sex' => $request->sex,
          'previous_school' => $request->previous_school,
          'admission_year' => $request->admission_year,
          'admission_class' => $request->admission_class,
          'admission_reason' => $request->admission_reason,
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
