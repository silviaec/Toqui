<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Klass extends Model
{
    protected $table = 'klasses';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'id', 'code'
    ];


    /**
     * Get the comments for the blog post.
     */
    public function owner()
    {
        return $this->hasOne('App\User');
    }

    public function users()
    {
        return $this->belongsToMany('App\User')->using('App\KlassUser');
    }

}
