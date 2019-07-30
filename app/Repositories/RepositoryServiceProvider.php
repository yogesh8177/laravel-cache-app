<?php
namespace App\Repositories;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            'App\Repositories\Contracts\RepositoryContract',
            'App\Repositories\PostRepository'
        );

        $this->app->bind(
            'App\Repositories\Contracts\RepositoryContract',
            'App\Repositories\ArticlesRepository'
        );

        $this->app->bind(
            'App\Repositories\Contracts\RepositoryContract',
            'App\Repositories\UserRepository'
        );
    }
}