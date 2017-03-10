<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Pocket extends Model
{
    use SoftDeletes;
    protected $table = 'pockets';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    	 'user_id', 'name', 'type', 'descrip', 'password', 'month'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function links()
    {
        return $this->hasMany('App\Link');
    }

    public function shares()
    {
        return $this->hasMany('App\Share', 'pocket_id');
    }

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
