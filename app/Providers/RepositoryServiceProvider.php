<?php
namespace App\Providers;

use App\Models\UserType;
use App\Repositories\UserTypeInterface;
use App\Repositories\UserTypeRepo;
use Carbon\Laravel\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(UserTypeInterface::class, function ($app){
            return new UserTypeRepo(UserType::class);
        });
    }
}
