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
        $headline = Post::inRandomOrder()->first();
        $last_posts = Post::orderBy('created_at', 'desc')->take(3)->get();
        $other_posts = Post::orderBy('created_at', 'desc')->skip(3)->take(8)->get();

    	return view('blogs.index', compact('headline', 'last_posts', 'other_posts'));
    }

    private function getBlogSidebarContent() {
        $this->last_posts = Post::orderBy('created_at', 'desc')->take(3)->get();
        $this->categories = Category::all();
        $this->tags = Tag::all();
    }

    public function showPost() {
        $posts = Post::orderBy('created_at', 'desc')->paginate(8);

    	return view('blogs.articles', compact('posts'));
    }

    public function showPostDetail($slug) {
        $post = Post::where('slug', $slug)->first();

        preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $post->content, $image);
        $image['src'] = !empty($image) ? $image['src'] : 'images/dummy.jpg';

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

    public function showContact() {

        return view('blogs.contact', compact('posts'));
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
        $posts = Post::where('title', 'LIKE', '%'.$keyword.'%')->orWhere('content', 'LIKE', '%'.$keyword.'%')->paginate(8);
        $posts->appends(\Request::only('q'))->links();

        $other_posts = '';
        if (count($posts) == 0) {
            $other_posts = Post::inRandomOrder()->take(4)->get();
        }
        return view('blogs.search', compact('posts', 'other_posts'));
    }

    public function searchBy($type, $keyword) {
        if ($type == 'tag') {
            $keywordName = Tag::where('slug', $keyword)->first();
            if (empty($keywordName)) return abort(404);
            $posts = Post::whereHas('tags', function ($q) use ($keyword) {
                $q->where('tags.slug', '=', $keyword);
            })->paginate(8);
        } else {
            $keywordName = Category::where('slug', $keyword)->first();
            if (empty($keywordName)) return abort(404);
            $posts = Post::whereHas('categories', function ($q) use ($keyword) {
                $q->where('categories.slug', '=', $keyword);
            })->paginate(8);
        }

        $other_posts = '';
        if (count($posts) == 0) {
            $other_posts = Post::inRandomOrder()->take(4)->get();
        }

        return view('blogs.searchby', compact('posts', 'type', 'keywordName', 'other_posts'));
    }

}
