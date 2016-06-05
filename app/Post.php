<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Post extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $sluggable = [
        'build_from'=> 'title',
        'save_to'   => 'slug'
    ];

    protected $fillable = ['title', 'slug', 'content', 'image', 'author_id'];

    public function categories() {
    	return $this->belongsToMany('App\Category');
    }

    public function tags() {
    	return $this->belongsToMany('App\Tag');
    }

    public function author() {
        return $this->belongsTo('App\User');
    }
}
