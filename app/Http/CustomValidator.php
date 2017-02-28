<?php

namespace App\Http;

use App\Holiday;
use App\Staff;
use App\User;
use Carbon\Carbon;

use Auth;

class CustomValidator {

    public function validateAvailableDays($attribute, $value, $parameters, $validator)
    {
        $holidays = Holiday::where('staff_id', '=', Auth::user()->staff->id)
                    ->where('approved', !1)->sum('hours_requested');
        $entitlement = User::where('id', '=', Auth::user()->staff->id)->first();
        
        $remaining = $entitlement->staff->holiday_entitlement * 8 - $holidays;
        
        if((int)$value > $remaining)
        {
            return false;
        }
        
        return true;
     }
     
    public function validateAvailableSaturdays($attribute, $value, $parameters, $validator)
    {
        $saturdays = Holiday::where('staff_id', '=', Auth::user()->staff->id)->sum('saturday');
        
        $remaining = 5 - $saturdays;
        
        if((int)$value > $remaining)
        {
            return false;
        }
        
        return true;
     }
     
    public function validateOnOrAfter($attribute, $value, $parameters, $validator)
    {
        
        $comparison = array_get($validator->getData(), $parameters[0]);
        
        if(Carbon::parse($comparison) > Carbon::parse($value))
        {
            return false;
        }
        
        return true;
        
     }
     
     public function validateInAdvance($attribute, $value, $parameters, $validator)
     {
         $weeks = $parameters[0];
         
         $date = Carbon::parse($value);
         
         $limit = Carbon::now()->addWeeks($weeks);
         
         if( $date > $limit )
         {
             return false;
         }
         
         return true;
     }
     
     public function validateInLieu($attribute, $value, $parameters, $validator)
     {
         $weeks = $parameters[0];
         
         $date = Carbon::parse($value);
         
         $limit = Carbon::now()->addWeeks(-$weeks);
         
         if( $date < $limit )
         {
             return false;
         }
         
         return true;
     }

}