<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Validator;

use App\Post;
use App\Category;
use App\Tag;

class BlogController extends Controller
{

    public function index() {
    	return view('blogs.index');
    }

    private function getBlogSidebarContent() {
        $this->last_posts = Post::orderBy('created_at', 'desc')->take(3)->get();
        $this->categories = Category::all();
        $this->tags = Tag::all();
    }

    public function showPost() {
        $posts = Post::orderBy('created_at', 'desc')->simplePaginate(5);
        $this->getBlogSidebarContent();

    	return view('blogs.blog', [
            'posts' => $posts, 
            'categories' => $this->categories, 
            'tags' => $this->tags, 
            'last_posts' => $this->last_posts
        ]);
    }

    public function showPostDetail($slug) {
        $post = Post::where('slug', $slug)->first();
        $this->getBlogSidebarContent();

    	return view('blogs.detail', [
            'post' => $post, 
            'categories' => $this->categories, 
            'tags' => $this->tags, 
            'last_posts' => $this->last_posts
        ]);
    }

    public function showAbout() {
        $this->getBlogSidebarContent();
        return view('blogs.about', [
            'categories' => $this->categories, 
            'tags' => $this->tags, 
            'last_posts' => $this->last_posts
        ]);
    }

    public function showContact() {
    	$this->getBlogSidebarContent();
        return view('blogs.contact', [
            'categories' => $this->categories, 
            'tags' => $this->tags, 
            'last_posts' => $this->last_posts
        ]);
    }

    public function sendEmail(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'      => 'required|min:3',
            'email'     => 'required|email',
            'subject'   => 'required',
            'message'   => 'required|min:5'
        ]);

        if ($validator->fails()) {
            return redirect('contact')
                ->withErrors($validator)
                ->withInput();
        }
        $header = "From: $request->name <$request->email>";
        @mail('about.nurmuhammad@gmail.com', $request->subject, $request->message, $header);

        if (@mail) {
            return redirect('contact', ['success' => 'Successfully sent your message.']);
        }
        return redirect('contact');
    }
}
