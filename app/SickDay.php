<?php

namespace App;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class SickDay extends Model
{
    protected $guarded = ['id'];
    
    protected $dates = ['created_at', 'updated_at', 'sick_from', 'sick_to', 'date_deducted'];
    
    public function staff()
    {
        return $this->belongsTo('App\Staff', 'staff_id');
    }
}
