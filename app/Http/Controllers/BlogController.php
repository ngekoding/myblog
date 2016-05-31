<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BlogController extends Controller
{

    public function index() {
    	return view('blogs.index');
    }

    public function showPost() {
    	return view('blogs.blog');
    }

    public function showPostDetail($slug) {
    	return $slug;
    }

    public function showContact() {
    	return view('blogs.contact');
    }
}
