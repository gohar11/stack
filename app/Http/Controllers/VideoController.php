<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Videos;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\User;

class VideoController extends Controller
{
    public function index()
    {
        $videos =  new Videos;
        $videos = $videos::all();

        return view('videos.index', compact('videos'));
    }

    public function create(){
        return view('videos.create');
    }

    public function store(Request $request){

        $video = new Videos;
        $video->user_id = Auth::id();
        $video->title = $request->get('title');
        $video->body = $request->get('body');
        $video->save();
        return back();
    }

    public function show($id){
        $video = new Videos;
        $video = $video::find($id);
        return view('videos.show', compact('video'));
    }

}
