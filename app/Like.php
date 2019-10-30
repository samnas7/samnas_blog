<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //
    protected $fillable = [
        'status',
    ];

    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }
}
