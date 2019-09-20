<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPostLove extends Model
{
     /**
     * Get the comments for the blog post.
     */
    public function post()
    {
        return $this->hasOne('App\Post');
    }
}
