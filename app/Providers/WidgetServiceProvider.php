<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Holiday;
use App\User;
use App\Staff;
use Auth;

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
            $view->with('entitlement', User::where('id', '=', Auth::user()->id)->first());
            $view->with('remainingSat', 5 - Holiday::sum('saturday'));
            $view->with('remainingDays', 2);
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
