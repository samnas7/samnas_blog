<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    //
    protected $fillable = [
        /* 'country',
        'state',
        'city', */
        'high_temp',
        'low_temp',
        'humidity',
        'cloud_cover',
        'dew_point',
        'uv_index',
        'visibility',
        'snow',
        'ice',
        'wet_bulb',
        'ceiling',
        'rain',
        'wind',
        'user_id',
        'location_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function location()
    {
        return $this->belongsTo('App\Location');
    }
}
