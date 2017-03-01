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
        Validator::extend('inAdvance', 'App\Http\CustomValidator@validateInAdvance');
        Validator::extend('inLieu', 'App\Http\CustomValidator@validateInLieu');
        Validator::extend('availableTime', 'App\Http\CustomValidator@validateAvailableTime');
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
