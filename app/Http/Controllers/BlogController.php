<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Route;

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

    private function getRouteName() {
        return Route::getFacadeRoot()->current()->uri();
    }

    public function showPost() {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        
        $this->getBlogSidebarContent();

        $categories = $this->categories;
        $tags = $this->tags;
        $last_posts = $this->last_posts;
        $uri = $this->getRouteName();

    	return view('blogs.blog', compact('posts', 'categories', 'tags', 'last_posts', 'uri'));
    }

    public function showPostDetail($slug) {
        $post = Post::where('slug', $slug)->first();
        
        $this->getBlogSidebarContent();

        $categories = $this->categories;
        $tags = $this->tags;
        $last_posts = $this->last_posts;
        $uri = $this->getRouteName();

    	return view('blogs.detail', compact('post', 'categories', 'tags', 'last_posts', 'uri'));
    }

    public function showAbout() {
        $this->getBlogSidebarContent();


        $categories = $this->categories;
        $tags = $this->tags;
        $last_posts = $this->last_posts;
        $uri = $this->getRouteName();

        return view('blogs.about', compact('posts', 'categories', 'tags', 'last_posts', 'uri'));
    }

    public function showContact() {
    	$this->getBlogSidebarContent();


        $categories = $this->categories;
        $tags = $this->tags;
        $last_posts = $this->last_posts;
        $uri = $this->getRouteName();

        return view('blogs.contact', compact('posts', 'categories', 'tags', 'last_posts', 'uri'));
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
        
        if (@mail('blog.nurmuhammad@gmail.com', $request->subject, $request->message, $header)) {
            return redirect('contact', ['success' => 'Successfully sent your message.']);
        }
        return redirect('contact');
    }

    public function search() {
        $keyword = \Request::get('q');
        $posts = Post::where('title', 'LIKE', '%'.$keyword.'%')->orWhere('content', 'LIKE', '%'.$keyword.'%')->paginate(5);
        $posts->appends(\Request::only('q'))->links();
        
        $this->getBlogSidebarContent();

        $categories = $this->categories;
        $tags = $this->tags;
        $last_posts = $this->last_posts;
        $uri = $this->getRouteName();

        return view('blogs.search', compact('posts', 'categories', 'tags', 'last_posts', 'uri'));
    }

    public function searchBy($type, $keyword) {
        if ($type == 'tag') {
            $keywordName = Tag::where('slug', $keyword)->first();
            if (empty($keywordName)) return abort(404);
            $posts = Post::whereHas('tags', function ($q) use ($keyword) {
                $q->where('tags.slug', '=', $keyword);
            })->paginate(5);
        } else {
            $keywordName = Category::where('slug', $keyword)->first();
            if (empty($keywordName)) return abort(404);
            $posts = Post::whereHas('categories', function ($q) use ($keyword) {
                $q->where('categories.slug', '=', $keyword);
            })->paginate(5);
        }

        $this->getBlogSidebarContent();

        $categories = $this->categories;
        $tags = $this->tags;
        $last_posts = $this->last_posts;
        $uri = $this->getRouteName();

        return view('blogs.searchby', compact('posts', 'categories', 'tags', 'last_posts', 'type', 'keywordName','uri'));
    }

}
