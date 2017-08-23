<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if(getenv('APP_ENV') === 'local' && class_exists(\Barryvdh\Debugbar\ServiceProvider::class)){
            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
        }
        //
    }
}
