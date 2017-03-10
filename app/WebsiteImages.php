<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebsiteImages extends Model
{
    protected $table = 'websiteImages';
    protected $fillable = [
    	'name', 'image', 'size'
    ];
}
