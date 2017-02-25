<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Holiday;
use App\LieuHour;
use App\SickDay;
use App\FreeTime;
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
            $view->with('total', Holiday::where('staff_id', '=', Auth::user()->id)->sum('hours_requested') / 8);
            $view->with('entitlement', User::where('id', '=', Auth::user()->id)->first());
            $view->with('remainingSat', 5 - Holiday::where('staff_id', '=', Auth::user()->id)->sum('saturday'));
        });
        
        view()->composer('widgets.lieuHour', function($view){
            $view->with('total', LieuHour::where('staff_id', '=', Auth::user()->id)->sum('lieu_hours'));
        });
        
        view()->composer('widgets.sickDay', function($view){
            $view->with('total', "8 dummy");
        });
        
        view()->composer('widgets.freeTime', function($view){
            $view->with('total', "3 dummy");
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
