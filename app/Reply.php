<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //
    protected $fillable = [
        'name',
        'email',
        'message',
        'comment_id',
        'status',
    ];

    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }
}
