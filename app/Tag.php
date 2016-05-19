<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'slug'];

    public function post() {
    	return $this->belongsToMany('App\Post');
    }
}
