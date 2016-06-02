<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

class BlogController extends Controller
{

    public function index() {
    	return view('blogs.index');
    }

    public function showPost() {
        $posts = Post::orderBy('created_at', 'desc')->simplePaginate(5);

    	return view('blogs.blog', compact('posts'));
    }

    public function showPostDetail($slug) {
    	return $slug;
    }

    public function showContact() {
    	return view('blogs.contact');
    }
}
