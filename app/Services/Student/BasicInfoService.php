<?php

namespace App\Services\Student;

use App\Repositories\Student\BasicInfoRepo;

class BasicInfoService
{
	protected $std_basic_info_repo;
	
	public function __construct(BasicInfoRepo $std_basic_info_repo)
	{
		$this->std_basic_info_repo = $std_basic_info_repo;
	}

	public function index()
	{
		return $this->std_basic_info_repo->getAll();
	}
}