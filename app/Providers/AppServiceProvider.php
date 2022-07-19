<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;//cassio
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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {      //cassio aumenta os caracteres
        Schema::defaultStringLength(191);
    }
}
