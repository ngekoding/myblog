<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;

use App\Post;

class PostController extends Controller
{
    public function index() {
    	return view('admin.posts.index');
    }

    public function create() {
    	$categories = Category::all();

    	return view('admin.posts.create', ['categories' => $categories]);
    }

    public function store(Request $request) {

    }

    public function edit($id) {

    }

    public function update($id, Request $request) {

    }

    public function destroy($id) {

    }
}
