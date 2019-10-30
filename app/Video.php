<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //
    protected $fillable = [
        'title',
        'post_id',
    ];
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
