@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">{{ $post->title }}</h1>
    </div>
	<div class="container">
        <div class="row mb-5">
            <div class="col-lg-8">

                <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left-circle"></span> Back to all my posts</a>
                <div class="float-end"> 
                    <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning rounded-start"><span data-feather="edit"></span> Edit</a>
                    <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger rounded-end" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span> Delete</button>
                    </form>    
                </div>
                
                @if ($post->image)
                    <div style="height:350px; overflow:hidden;" class="rounded-3">
                        <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid rounded-3 mt-3" alt="{{ $post->category->name }}">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x500?{{ $post->category->name }}" class="img-fluid rounded-3 mt-3" alt="{{ $post->category->name }}">
                @endif

                

                <article class="my-3 fs-5" style="text-align: justify">
                    {!! $post->body !!}
                </article>

            </div>
        </div>
    </div>
@endsection