<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'name', 'email', 'password', 'username', 'gender', 'bio'
    ];

    public function pockets()
    {
        return $this->hasMany('App\Pocket');
    }

    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    public function follows()
    {
        return $this->hasMany('App\Follow');
    }

    public function shares()
    {
        return $this->hasMany('App\Share');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /** 
    * Make passowrd encripted 
    *
    * @var $val
    * @return void
    */
    public function setPasswordAttribute($val){
      $this->attributes['password'] = bcrypt($val);
    }
}
