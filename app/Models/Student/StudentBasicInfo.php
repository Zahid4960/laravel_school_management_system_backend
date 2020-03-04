<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;

class StudentBasicInfo extends Model
{
    protected $table = 'student_basic_infos';

    protected $fillable = [
      'first_name',
      'last_name',
      'email',
      'mobile',
      'dop',
      'gender',
      'previous_school',
      'admission_year',
      'admission_class',
      'admission_reason',
      'created_by',
      'user_id'
    ];
}
