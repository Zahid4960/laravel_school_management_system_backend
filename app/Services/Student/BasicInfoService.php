<?php

namespace App\Services\Student;

// repositories
use App\Repositories\Student\BasicInfoRepo;

// requests
use Illuminate\Http\Request;

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

	
	public function store(Request $request)
	{
		$std_basic_info_data = $request->all();

		return $this->std_basic_info_repo->saveStdBasicInfo($std_basic_info_data);
	}


	public function show($id)
	{
		return $this->std_basic_info_repo->findStdBasicInfoById($id);
	}
}