<?php

namespace App\Repositories\Student;

// models
use App\Models\Student\StudentBasicInfo;

class BasicInfoRepo
{
	protected $std_basic_info;

	public function __construct(StudentBasicInfo $std_basic_info)
	{
		$this->std_basic_info = $std_basic_info;
	}


	public function getAll()
	{
		$list = (new $this->std_basic_info)->newQuery();

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

        return $student_basic_info = $list->paginate(request()->get('limit') ?? 10);
	}
}