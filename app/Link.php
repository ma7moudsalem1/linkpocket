<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Link extends Model
{
    use SoftDeletes;
    protected $table = 'links';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    	 'pocket_id', 'title', 'link'
    ];

    public function pocket()
    {
    	return $this->belongsTo('App\Pocket');
    }

}
