@extends('layouts.app')

@section('title', 'Timeline')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a Post</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('posts.store') }}">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control @error('body') is-invalid @enderror" name="body" rows="3" placeholder="What's on your mind?" required></textarea>
                            @error('body')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Post</button>
                    </form>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">Timeline</div>
                <div class="card-body">
                    @foreach($posts as $post)
                        <div class="post mb-3">
                            <p>{{ $post->body }}</p>
                            <small>{{ $post->created_at->diffForHumans() }}</small>
                        </div>
                        <hr>
                    @endforeach
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
