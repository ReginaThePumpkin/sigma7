<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

//!Usame si las migraciones no sirven: use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //!Usame si las migraciones no sirven: Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

