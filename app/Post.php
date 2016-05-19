<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'content', 'author_id', 'category_id'];

    public function category() {
    	return $this->hasOne('App\Category');
    }

    public function tag() {
    	return $this->belongsToMany('App\Tag');
    }
}
