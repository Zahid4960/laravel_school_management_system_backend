<?php


namespace App\Services\User;

// services
use App\Services\BaseService;

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
}
