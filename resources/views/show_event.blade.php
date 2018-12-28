@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <p><b>{{ $event->event_title }}</b></p>
                        <p>
                            {{ $event->event_content }}
                        </p>
                    </div>
                </div>
                <hr/>
                <h4>Display reviews</h4>
                @include('partials._review_replies', ['reviews' => $event->reviews, 'id' => $event->id, 'current_user_id' => Auth::id()])
                <hr/>
                <h4>Add Review</h4>
                <form method="post" action="{{ route('review.add') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="body" class="form-control"/>
                        <input type="hidden" name="id" value="{{ $event->id }}"/>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-warning" value="Add Review"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection