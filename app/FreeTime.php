<?php

namespace App;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class FreeTime extends Model
{
    protected $guarded = ['id'];
    
    protected $table = 'free_times';
    
    protected $dates = ['created_at', 'updated_at', 'date_regarding'];
    
    public function staff()
    {
        return $this->belongsTo('App\Staff', 'staff_id');
    }
}
