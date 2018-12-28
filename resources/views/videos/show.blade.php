<!-- show.blade.php -->

@extends('layouts.app')
<style>
    .display-comment .display-comment {
        margin-left: 40px
    }
</style>
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <p><b>{{ $video->title }}</b></p>
                        <p>
                            {!!  $video->body !!}
                        </p>
                        <hr />
                        <h4>Display Comments</h4>
                        @include('partials._video_comment_replies', ['comments' => $video->comments, 'video_id' => $video->id])
                        <h4>Add comment</h4>
                        <form method="POST" action="{{route('comment.video_store')}}">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="comment_body" class="form-control" />
                                <input type="hidden" name="video_id" value="{{ $video->id }}" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-warning" value="Add" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection