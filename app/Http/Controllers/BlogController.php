<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;
use App\Category;
use App\Tag;

class BlogController extends Controller
{

    public function index() {
    	return view('blogs.index');
    }

    public function showPost() {
        $posts = Post::orderBy('created_at', 'desc')->simplePaginate(5);
        $last_posts = Post::orderBy('created_at', 'desc')->take(3)->get();
        $categories = Category::all();
        $tags = Tag::all();

    	return view('blogs.blog', compact('posts', 'categories', 'tags', 'last_posts'));
    }

    public function showPostDetail($slug) {
        $post = Post::where('slug', $slug)->first();
        $last_posts = Post::orderBy('created_at', 'desc')->take(3)->get();
        $categories = Category::all();
        $tags = Tag::all();

    	return view('blogs.detail', compact('post', 'categories', 'tags', 'last_posts'));
    }

    public function showContact() {
    	return view('blogs.contact');
    }
}
