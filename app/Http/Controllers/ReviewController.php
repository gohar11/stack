<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;
use App\Review;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $review = new Review();
        $review->body = $request->get('body');
        $data = $review->user()->associate($request->user());
        $event = Events::find($request->get('id'));
        $event->reviews()->save($review);

        return back();
    }

//    public function reviewReplyStore(Request $request)
//    {
//        $reply = new Comment();
//        $reply->body = $request->get('comment_body');
//        $reply->user()->associate($request->user());
//        $reply->parent_id = $request->get('comment_id');
//        $post = Post::find($request->get('post_id'));
//        $post->comments()->save($reply);
//        return back();
//
//    }


    public function delete(Request $request)
    {
        $review = Review::find($request->get('review_id'));
        $review->delete();
        return back();
    }


}
