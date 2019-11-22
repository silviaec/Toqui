<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hashtag extends Model
{
    use SoftDeletes;

    public function posts()
    {
        return $this->belongsToMany('App\Post')->using('App\HashtagPost');
    }
}
