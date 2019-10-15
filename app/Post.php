<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'text', 'userId', 'short_text', 'images', 'klass_id', 'hash'
    ];
   
    public function user()
    {
        return $this->belongsTo('App\User', 'userId');
    }

    public function userPostLove()
    {
        return $this->hasMany('App\UserPostLove');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function hashtags()
    {
        return $this->belongsToMany('App\Hashtag')->using('App\HashtagPost');
    }
}
