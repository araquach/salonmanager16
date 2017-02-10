<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Holiday;

class WidgetServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('widgets.holiday', function($view){
            $view->with('total', Holiday::sum('hours_requested') / 8);
            $view->with('entitlement', 27);
            $view->with('remainingSat', 2);
            $view->with('remainingDays', 20);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
