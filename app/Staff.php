<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $guarded = ['id'];
    
    protected $dates = ['created_at', 'updated_at'];
    
    protected $with = ['user'];
    
    // protected $with = ['holiday'];
    
    protected $table = 'staffs';
    
    public function user()
    {
        return $this->belongsTo('App\User', 'staff_id');
    }
    
    public function holidays()
    {
        return $this->hasMany('App\Holiday', 'staff_id');
    }
}
