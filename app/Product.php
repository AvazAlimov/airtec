<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = [
        'name', 'price', 'info',
    ];

     public function images()
    {
        return $this->morphMany('App\File', 'fileable');
    }
	public function tags()
    {
        return $this->belongsToMany('App\Tag','points');
    }
}
