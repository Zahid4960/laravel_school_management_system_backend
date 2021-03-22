<?php
namespace App\Services;

use App\Repositories\UserTypeInterface;

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

    public function store($data)
    {
        return $this->userTypeRepo->saveData($data);
    }

    public function show($id)
    {
        return $this->userTypeRepo->findById($id);
    }

    public function update($data, $id)
    {
        return $this->userTypeRepo->dataUpdate($data, $id);
    }

    public function destroy($id)
    {
        return $this->userTypeRepo->deleteData($id);
    }
}
