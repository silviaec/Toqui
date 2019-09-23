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
        'title', 'text', 'userId', 'short_text', 'images',
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

}
