<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //

    protected $fillable = [
        'city',
    ];
    public function locations()
    {
        return $this->hasMany('App\Location');
    }
}
