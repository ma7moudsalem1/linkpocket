<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	protected $table = 'messages';
	protected $fillable = [
		'user_id', 'user_id_reciever', 'type', 'message'
	];
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
