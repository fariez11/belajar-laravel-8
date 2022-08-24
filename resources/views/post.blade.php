@extends('layouts.main')

@section('container')

    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h2 class="mb-3">{{ $post->title }}</h2>

                <p> By.<a href="/posts?author={{ $post->user->username }}" class="text-decoration-none fst-italic">{{ $post->user->name }}</a> in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
                @if ($post->image)
                <div style="height:350px; overflow:hidden;" class="rounded-3">
                    <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid rounded-3 mt-3" alt="{{ $post->category->name }}">
                </div>
                @else
                    <img src="https://source.unsplash.com/1200x500?{{ $post->category->name }}" class="img-fluid rounded-3" alt="{{ $post->category->name }}">
                @endif
                

                <article class="my-3 fs-5" style="text-align: justify">
                    {!! $post->body !!}
                </article>

                <a href="/posts" class="d-block text-decoration-none btn btn-primary">back to posts</a>
            </div>
        </div>
    </div>
    
    
@endsection

