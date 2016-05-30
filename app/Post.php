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

    public function categories() {
    	return $this->belongsToMany('App\Category');
    }

    public function tag() {
    	return $this->belongsToMany('App\Tag', 'post_tags');
    }

    public function author() {
        return $this->belongsTo('App\User');
    }
}
