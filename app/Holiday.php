<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    protected $guarded = ['id'];
    
    protected $dates = ['created_at', 'updated_at', 'request_date_from', 'request_date_to'];
    
    public function setHoursRequestedAttribute($value) 
    {
        $this->attributes['hours_requested'] = $value * 8;
    }
}
