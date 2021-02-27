<?php


namespace App\Services\User;

// interfaces
use App\Repositories\Interfaces\User\UserTypeInterface;
use http\Env\Request;

class UserTypeService
{
    private $userTypeRepo;

    public function __construct(UserTypeInterface $userTypeRepo)
    {
        $this->userTypeRepo = $userTypeRepo;
    }

    public function index()
    {
        return $this->userTypeRepo->getAll();
    }

    public function store(array $data)
    {
        return $this->userTypeRepo->saveData($data);
    }

    public function show($id)
    {
        return $this->userTypeRepo->findById($id);
    }

}
