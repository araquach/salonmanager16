<?php

namespace App;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    protected $guarded = ['id'];
    
    protected $dates = ['created_at', 'updated_at', 'request_date_from', 'request_date_to'];
    
    public function staff()
    {
        return $this->belongsTo('App\Staff', 'id');
    }
    
    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            if ($model->request_date_from > Carbon::now()->addWeeks(2))
            {
                $model->prebooked = 1;
            }
            
            return $model;
        });
    }
    
    public function setHoursRequestedAttribute($value) 
    {
        $this->attributes['hours_requested'] = $value * 8;
    }
}
