<?php

namespace App\Http\Requests\Student\StudentBasicInfo;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'sex' => 'required',
            'admission_year' => 'required',
            'admission_class' => 'required'
        ];
    }
}
