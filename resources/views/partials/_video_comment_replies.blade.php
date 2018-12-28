@foreach($comments as $comment)
    <div class="display-comment">
        <strong>{{ $comment->user->name }}</strong>
        <p>"{{ $comment->body }}"</p>
        <form method="POST" action="{{route('comment.video_comment_reply')}}">
            @csrf
            <div class="form-group">
                <input type="text" name="comment_body" class="form-control" />
                <input type="hidden" name="video_id" value="{{ $video_id }}" />
                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Reply" />
            </div>
        </form>
        @include('partials._video_comment_replies', ['comments' => $comment->repliesList])
    </div>
@endforeach