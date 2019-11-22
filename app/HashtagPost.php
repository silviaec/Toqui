<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class HashtagPost extends Pivot
{
    use SoftDeletes;
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
