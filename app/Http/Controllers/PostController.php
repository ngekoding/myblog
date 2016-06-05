<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PostRequest;

use App\Category;
use App\Tag;
use App\Post;
use App\User;

use Validator;

use Alert;

class PostController extends Controller
{
    public function index() {
        if (auth()->user()->hasRole('admin')) {
            $posts = Post::paginate(10);
        } else {
            $posts = Post::where('author_id', auth()->user()->id)->paginate(10);
        }

    	return view('admin.posts.index', compact('posts'));
    }

    public function create() {
    	$categories = Category::lists('name', 'id');
        $tags = Tag::lists('name', 'id');

    	return view('admin.posts.create', compact('tags', 'categories'));
    }

    public function store(PostRequest $request) {
        
        $post = new Post();

        $post->title = $request->title;
        $post->author_id = auth()->user()->id;
        $post->content = $request->content;
        $post->image = $request->image;

        $post->save();
        
        if (!empty($request->categories)) {
            $post->categories()->sync($request->categories);
        }
        if (!empty($request->tags)) {
            $post->tags()->sync($request->tags);
        }

        Alert::success('Successfully create post!', 'Created');
        return redirect('posts/create');
    }

    public function edit($id) {
        $post = Post::find($id);
        $categories = Category::lists('name', 'id');
        $tags = Tag::lists('name', 'id');

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update($id, PostRequest $request) {

        $post = Post::find($id);

        $post->title = $request->title;
        $post->author_id = auth()->user()->id;
        $post->content = $request->content;
        $post->image = $request->image;

        $post->save();

        if (!empty($request->categories)) {
            $post->categories()->sync($request->categories);
        }
        if (!empty($request->tags)) {
            $post->tags()->sync($request->tags);
        }

        Alert::success('Successfully update post!', 'Updated');
        return redirect('posts');
    }

    public function destroy($id) {
        $post = Post::find($id);
        $post->delete();

        Alert::success('Successfully delete post!', 'Deleted');
        return redirect('posts');
    }
}
