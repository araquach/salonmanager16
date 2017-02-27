<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('availableDays', 'App\Http\CustomValidator@validateAvailableDays');
        Validator::extend('availableSaturdays', 'App\Http\CustomValidator@validateAvailableSaturdays');
        Validator::extend('onOrAfter', 'App\Http\CustomValidator@validateOnOrAfter');
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
