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

    protected $last_posts;
    protected $categories;
    protected $tags;

    public function __construct() {
        $this->getBlogSidebarContent();
    }

    public function index() {
    	return view('blogs.index');
    }

    private function getBlogSidebarContent() {
        $this->last_posts = Post::orderBy('created_at', 'desc')->take(3)->get();
        $this->categories = Category::all();
        $this->tags = Tag::all();
    }

    public function showPost() {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);

    	return view('blogs.blog', compact('posts'))
            ->with([
                'last_posts' => $this->last_posts,
                'categories' => $this->categories,
                'tags' => $this->tags
            ]);
    }

    public function showPostDetail($slug) {
        $post = Post::where('slug', $slug)->first();

        preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $post->content, $image);
        if (empty($image)) {
            $image['src'] = '';
        }
        $img = !empty($post->image) ? $post->image : $image['src'];

        $meta = [
            'title' => $post->title,
            'description' => strip_tags($post->content),
            'image' => $img
        ];

    	return view('blogs.detail', compact('post', 'meta'))
            ->with([
                'last_posts' => $this->last_posts,
                'categories' => $this->categories,
                'tags' => $this->tags
            ]);
    }

    public function showAbout() {

        return view('blogs.about', compact('posts'))
            ->with([
                'last_posts' => $this->last_posts,
                'categories' => $this->categories,
                'tags' => $this->tags
            ]);
    }

    public function showContact() {

        return view('blogs.contact', compact('posts'))
            ->with([
                'last_posts' => $this->last_posts,
                'categories' => $this->categories,
                'tags' => $this->tags
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

        if (@mail('blog.nurmuhammad@gmail.com', $request->subject, $request->message, $header)) {
            return redirect('contact')->with('success', 'Successfully sent your message.');
        }
        return redirect('contact');
    }

    public function search() {
        $keyword = \Request::get('q');
        $posts = Post::where('title', 'LIKE', '%'.$keyword.'%')->orWhere('content', 'LIKE', '%'.$keyword.'%')->paginate(5);
        $posts->appends(\Request::only('q'))->links();

        return view('blogs.search', compact('posts'))
            ->with([
                'last_posts' => $this->last_posts,
                'categories' => $this->categories,
                'tags' => $this->tags
            ]);
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

        return view('blogs.searchby', compact('posts', 'type', 'keywordName'))
            ->with([
                'last_posts' => $this->last_posts,
                'categories' => $this->categories,
                'tags' => $this->tags
            ]);
    }

}
