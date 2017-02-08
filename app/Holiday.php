<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    protected $guarded = ['id', 'staff_id'];
    
    protected $dates = ['created_at', 'updated_at', 'request_date_from', 'request_date_to'];
}
