<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class PostController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $posts =  new Post;
        $posts = $posts::with('postsWithUser')->where('user_id', Auth::id())->get();

        return view('index', compact('posts'));
    }

    public function create()
    {
        return view('post');
    }

    public function store(Request $request)
    {
        $post =  new Post;
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->user_id = Auth::id();
        $post->save();
        return redirect('posts');

    }

    public function show($id)
    {
        $post = Post::find($id);
//        dd($post->toArray());
        return view('show', compact('post'));
    }
}
