<?php


namespace App\Services\User;

// interfaces
use App\Repositories\Interfaces\User\UserTypeInterface;

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

    public function show($id)
    {
        return $this->userTypeRepo->findById($id);
    }
}
