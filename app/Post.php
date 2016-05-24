<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'content', 'author_id', 'category_id'];

    public static $rules = [
    	'title' 	=> 'required|min:3', 
    	'slug' 		=> 'required',
    	'content' 	=> 'required'
    ];

    public function category() {
    	return $this->hasOne('App\Category');
    }

    public function tag() {
    	return $this->belongsToMany('App\Tag');
    }
}
