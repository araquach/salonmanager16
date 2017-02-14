<?php

namespace App;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class LieuHour extends Model
{
    protected $guarded = ['id'];
    
    protected $table = 'lieu_hours';
    
    protected $dates = ['created_at', 'updated_at', 'date_regarding'];
    
    public function staff()
    {
        return $this->belongsTo('App\Staff', 'staff_id');
    }
}
