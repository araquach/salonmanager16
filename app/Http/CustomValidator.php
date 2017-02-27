<?php

namespace App\Http;

use App\Holiday;
use App\Staff;
use App\User;

use Auth;

class CustomValidator {

    public function validateAvailableDays($attribute, $value, $parameters, $validator)
    {
        $holidays = Holiday::where('staff_id', '=', Auth::user()->staff->id)
                    ->where('approved', !1)->sum('hours_requested');
        $entitlement = User::where('id', '=', Auth::user()->staff->id)->first();
        
        $remaining = $entitlement->staff->holiday_entitlement * 8 - $holidays;
        
        // dd((int)$holidays, (int)$value, $remaining);
        
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

}