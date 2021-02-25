<?php


namespace App\Providers;

// models
use App\Models\User\UserType;

// repositories
use App\Repositories\InterfaceImp\User\UserTypeRepo;

// interfaces
use App\Repositories\Interfaces\User\UserTypeInterface;

// others
use Carbon\Laravel\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(UserTypeInterface::class, function ($app){
            return new UserTypeRepo(
              UserType::class
            );
        });
    }
}
