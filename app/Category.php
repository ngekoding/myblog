<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'slug', 'description'];

    public static $rules = [
    		'name' => 'required',
    		'slug' => 'required'
	];

    public function post() {
    	return $this->belongsTo('App\Post');
    }

}
