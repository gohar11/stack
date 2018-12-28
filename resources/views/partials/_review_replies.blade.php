<!-- _review_replies.blade.php -->

@foreach($reviews as $review)
    <div class="display-comment">
        @if ($current_user_id == $review->user_id)
            <form action="{{ route('review.delete') }}" method="post" class="float-right">
                @csrf
                <input type="hidden" name="review_id" value="{{ $review->id }}">
                <input type="submit" value="Delete" class="btn-danger btn">
            </form>
        @endif
        <strong>{{ $review->user->name }}</strong>
        <p>{{ $review->body }}</p>
    </div>
@endforeach