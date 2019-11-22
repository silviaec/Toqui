<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text', 'user_id', 'post_id', 'comment_id', 'deleted'
    ];

    public function post()
    {
        return $this->hasOne('App\Post');
    }

    public function user()
    {
        return $this->hasOne('App\User');
    }
}
