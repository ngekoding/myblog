<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BlogController extends Controller
{
	private $md12 = ['headWidth' => 'col-md-12'];
	private $md4  = ['headWidth' => 'col-md-4'];

    public function index() {
    	return view('layouts.master', $this->md12);
    }

    public function showPost() {
    	return view('blogs.blog', $this->md4);
    }

    public function showPostDetail($slug) {
    	return $slug;
    }

    public function showContact() {
    	return view('blogs.contact', $this->md4);
    }
}
