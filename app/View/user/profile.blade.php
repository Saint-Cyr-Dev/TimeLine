@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->name }}'s Profile</div>
                <div class="card-body">
                    @foreach($posts as $post)
                        <div class="post">
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
