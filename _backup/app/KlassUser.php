<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class KlassUser extends Pivot
{
    protected $table = 'klass_user';

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
        return $this->hasOne('App\Klass');
    }//
}
