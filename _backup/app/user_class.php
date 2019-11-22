<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_class extends Model
{
     /**
     * Get the comments for the blog post.
     */
    public function user()
    {
        return $this->hasOne('App\User');
    }
    
      /**
     * Get the comments for the blog post.
     */
    public function class()
    {
        return $this->hasOne('App\Class');
    }
    
}
