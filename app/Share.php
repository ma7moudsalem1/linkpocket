<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    protected $table = 'shares';
    protected $fillable = [
    	'user_id', 'pocket_id'
    ];
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function pocket()
    {
    	return $this->belongsTo('App\Pocket');
    }
}
