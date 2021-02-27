<?php

namespace App\Http\Requests\User\UserType;

use Illuminate\Foundation\Http\FormRequest;

class UserTypeSaveReq extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_type' => 'required'
        ];
    }
}
