<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentBasicInfo extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          'first_name' => 'required',
          'dop' => 'required',
          'gender' => 'required',
          'admission_year' => 'required',
          'admission_class' => 'required'
        ];
    }
}
