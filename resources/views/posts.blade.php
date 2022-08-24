@extends('layouts.main')

@section('container')

    <h1 class="mb-4 text-center">{{ $title }}</h1>
    
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/posts">
                    @if (request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    @if(request('user'))
                        <input type="hidden" name="user" value="{{ request('user') }}">
                    @endif
                    <div class="input-group mb-3">
                            <input type="text " class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
                            <button class="btn btn-outline-info" type="submit">Search</button>
                    </div>
            </form>
        </div>
    </div>

    @if ($posts->count())
        
        <div class="card mb-3">
            @if ($posts[0]->image)
                <div style="height:350px; overflow:hidden;" class="rounded-3">
                    <img src="{{ asset('storage/' . $posts[0]->image) }}" class="img-fluid rounded-3" alt="{{ $posts[0]->category->name }}">
                </div>
            @else
                <img src="https://source.unsplash.com/1200x300?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
            @endif
            
            <div class="card-body text-center">
              <h5 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h5>
                <p> 
                    <small class="text-muted">
                            By.<a href="/posts?user={{ $posts[0]->user->username }}" class="text-decoration-none">{{ $posts[0]->user->name }}</a> in <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none fst-italic">{{ $posts[0]->category->name }}</a>  {{ $posts[0]->created_at->diffForHumans() }}
                    </small>
                </p>
              <p class="card-text">{{ $posts[0]->excerpt }}</p>

                <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary"> Read More</a>
            </div>
          </div>

        <div class="container">
            <div class="row">
                @foreach ($posts->skip(1) as $post)
                <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="position-absolute px-3 py-2 fw-bold" style="background-color: rgba(251,251,251,0.6); border-radius: 0px 0px 10px 0px;"><a href="/posts?category={{ $post->category->slug }}" class="text-dark text-decoration-none">{{ $post->category->name }}</a></div>
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid rounded-3 mt-3" alt="{{ $post->category->name }}">
                            @else
                                <img src="https://source.unsplash.com/1000x500?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                            @endif
                            
                            <div class="card-body">
                            {{-- <h5 class="card-title">
                                    <a href=/posts/{{ $post->slug }}"/posts/{{ $post->slug }}" class="text-decoration-none"> {{ $post->title }} </a>
                            </h5> --}}
                            <h5 class="card-title">
                                    <a href="/posts/{{ $post->slug }}" class="text-decoration-none"> {{Str::limit ($post->title,30) }}</a>
                            </h5>
                            <p> 
                                <small class="text-muted">
                                        By.<a href="/posts?user={{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a>  {{ $post->created_at->diffForHumans() }}
                                </small>
                            </p>
                            {{-- <p class="card-text"> {{ $post->excerpt }}</p> --}}
                            <p class="card-text"> {{Str::limit ($post->excerpt,70) }}</p>
                            <a href="/posts/{{ $post->slug }}" class="btn btn-primary"> Read More</a>
                            </div>
                        </div>
                </div>
                @endforeach
            </div>
        </div>

    @else 
        <p class="text-center fs-3">No post found</p>
    @endif

    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
    

@endsection


