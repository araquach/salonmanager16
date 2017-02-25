<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Collective\Html\Eloquent\FormAccessible;


class LieuHour extends Model
{
    protected $guarded = ['id'];
    
    protected $table = 'lieu_hours';
    
    protected $dates = ['created_at', 'updated_at', 'date_regarding'];
    
    public function staff()
    {
        return $this->belongsTo('App\Staff', 'staff_id');
    }
    
    use FormAccessible;

    /**
     * Convert date_regarding date format
     *
     */
    public function formRequestDateRegardingAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }
}
