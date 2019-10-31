<?php

namespace App\Providers;

use App\Repo;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
//        $this->app->bind('Pro', Product::class);
//        $this->app->bind(\App\Repo\Animal::class, \App\Repo\Lion::class);
        $this->app->singleton(Repo\Animal::class, function (){
            return new Repo\Lion();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
