<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'title',
        'body',
        'category_id',
        'type_id',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }
    public function videos()
    {
        return $this->hasMany('App\Video');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($post) {
            $post->videos()->get()->each->delete();
            $post->images()->get()->each->delete();
            $post->comments()->get()->each->delete();
        });
    }
}
