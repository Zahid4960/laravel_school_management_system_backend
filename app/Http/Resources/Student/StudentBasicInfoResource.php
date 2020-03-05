<?php

namespace App\Http\Resources\Student;

// Models
use App\User;

// others
use Illuminate\Http\Resources\Json\JsonResource;

class StudentBasicInfoResource extends JsonResource
{
    public function toArray($request)
    {
        $data = [
          'id' => $this->id,
          'first_name' => $this->first_name,
          'last_name' => $this->last_name,
          'email' => $this->email,
          'mobile' => $this->mobile,
          'dop' => $this->dop,
          'gender' => $this->gender,
          'previous_school' => $this->previous_school,
          'admission_year' => $this->admission_year,
          'admission_class' => $this->admission_class,
          'admission_reason' => $this->admission_reason,
          'user_id' => $this->user_id,
          'user_name' => $this->getUserName(),
          'active' => $this->active,
          'created_by' => $this->created_by,
          // 'creator_name' => $this->getCreator_name(),
        ];

        return $data;
    }

    private function getUserName()
    {
      $user_name = User::where('id', $this->user_id)->first();
      if(!empty($user_name)){
        return $user_name->username;
      }
      return null;
    }
}
