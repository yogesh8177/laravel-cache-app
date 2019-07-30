<?php
namespace App\Repositories;

use Illuminate\Support\ServiceProvider;

class CacheServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->singleton(
            'App\Services\CacheService'
        );
    }
}