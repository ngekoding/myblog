<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PostRequest;

use App\Category;
use App\Post;
use App\User;

use Validator;

use Alert;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();

    	return view('admin.posts.index', ['posts' => $posts]);
    }

    public function create() {
    	$categories = Category::all();

    	return view('admin.posts.create', ['categories' => $categories]);
    }

    public function store(PostRequest $request) {
        
        $post = new Post();
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->author_id = User::where('role_id', 1)->first()->id;
        $post->content = $request->content;

        $post->save();
        
        if (!empty($request->categories)) {
            $post->categories()->sync($request->categories);
        }

        Alert::success('Successfully create post!', 'Success');

        return redirect('posts/create');
    }

    public function edit($id) {
        $post = Post::find($id);
        $categories = Category::all();

        return view('admin.posts.edit', ['post' => $post, 'categories' => $categories]);
    }

    public function update($id, PostRequest $request) {

        $post = Post::find($id);

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->author_id = User::where('role_id', 1)->first()->id;
        $post->content = $request->content;

        $post->save();

        if (!empty($request->categories)) {
            $post->categories()->sync($request->categories);
        }

        Alert::success('Successfully update post!', 'Success');
        return redirect('posts');
    }

    public function destroy($id) {
        $post = Post::find($id);
        $post->delete();

        Alert::success('Successfully delete post!', 'Success');
        return redirect('posts');
    }
}
