<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'name',
        'email',
        'body',
        'post_id',
        'status',
    ];
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
    public function replies()
    {
        return $this->hasMany('App\Reply');
    }
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
    // this is a recommended way to declare event handlers

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($comment) {
            $comment->replies()->get()->each->delete();
        });
    }
}
