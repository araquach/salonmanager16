<?php

namespace App\Http;

use App\Holiday;
use App\Staff;
use App\User;

use Auth;

class CustomValidator {

    public function validateAvailableDays($attribute, $value, $parameters, $validator)
    {
        $holidays = Holiday::where('staff_id', '=', Auth::user()->id)->sum('hours_requested');
        $entitlement = User::where('id', '=', Auth::user()->id)->first();
        
        $remaining = $entitlement->staff->holiday_entitlement * 8 - $holidays;
        
        // dd($remaining, (int)$value);
        
        if((int)$value > $remaining)
        {
            return false;
        }
        
        return true;
     }

}