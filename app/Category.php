<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Category extends Model implements SluggableInterface
{
	use SluggableTrait;
	
	protected $sluggable = [
        'build_from'=> 'name',
        'save_to'   => 'slug'
    ];

    public $timestamps = false;

    protected $fillable = ['name', 'slug', 'description'];

    public function posts() {
    	return $this->belongsToMany('App\Post');
    }

}
