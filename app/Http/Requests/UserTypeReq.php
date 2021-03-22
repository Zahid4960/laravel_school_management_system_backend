<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserTypeReq extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_type' => 'required|unique:user_types'
        ];
    }
}
