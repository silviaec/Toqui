<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class HashtagPost extends Pivot
{
    protected $table = 'hashtag_post';

     /**
     * Get the comments for the blog post.
     */
    public function post()
    {
        return $this->hasOne('App\Post');
    }
    
    /**
     * Get the comments for the blog post.
     */
    public function hashtag()
    {
        return $this->hasOne('App\Hashtag');
    }//
}
