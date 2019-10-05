<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Post;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the comments for the blog post.
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

 
    public function klasses()
    {
        return $this->belongsToMany('App\Klass')->using('App\KlassUser');
    }

     /**
     * Get the comments for the blog post.
     */
    public function loves()
    {
        return $this->hasMany('App\UserPostLove');
    }

    /**
     * Get the comments for the blog post.
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    
    public function changePassword($password) {
        if (Hash::check($password, $this->password)) {
            $this->password = Hash::make($password);
            $this->save();
            return ['result' => 1, 'messsage' => 'Contraseña actualizada exitosamente.'];
        } else {
            return ['result' => -1, 'messsage' => 'La contraseña actual no es correcta.'];
        }
    }
}
