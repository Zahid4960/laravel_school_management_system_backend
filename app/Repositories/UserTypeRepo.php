<?php


namespace App\Repositories\InterfaceImp\User;

// repositories
use App\Repositories\BaseRepository;

// interfaces
use App\Repositories\Interfaces\User\UserTypeInterface;

class UserTypeRepo extends BaseRepository implements UserTypeInterface
{
    public function __construct($model)
    {
        parent::__construct($model);
    }
}
