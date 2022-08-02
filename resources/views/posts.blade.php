@extends('layouts.main')

@section('container')
<h1 class="pb-5">{{ $title }}</h1>

@if ($posts->count())
  <div class="card mb-3 border-dark">
    <img src="https://source.unsplash.com/random/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
    <div class="card-body text-center bg-dark text-light">
      <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none">{{ $posts[0]->title }}</a></h3>
      <p>
        <small class="text-muted">
          By: <a href="/users/{{ $posts[0]->user->slug }}" class="text-decoration-none">{{ $posts[0]->user->name }}</a> in <a href="/categories/{{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}
        </small>
      </p>
      <p class="card-text">{{ $posts[0]->excerpt }}</p>
      <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>
    </div>
  </div>
@else
  <p class="text-center fs-3">No Post Found</p>
@endif

<div class="container mt-5">
  <div class="row">
    @foreach ($posts->skip(1) as $post)
    <div class="col-md-4 mb-4">
      <div class="card" style="width: 18rem;">
        <div class="position-absolute p-2 border border-info" style="background-color: rgba(0, 0, 0, 0.5); border-radius: 30px;">
          <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none text-light">{{ $post->category->name }}</a>
        </div>
        <img src="https://source.unsplash.com/random/500x300?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
        <div class="card-body">
          <h5 class="card-title"><a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a></h5>
          <p>
            <small class="text-muted">
              By: <a href="/users/{{ $post->user->slug }}" class="text-decoration-none">{{ $post->user->name }}</a>{{ $post->created_at->diffForHumans() }}
            </small>
          </p>
          <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

  {{-- @foreach ($posts as $post)
    <article class="mb-5 border-bottom pb-3">
      <h2>
        <a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a>
      </h2>
      <h5>By: <a href="/users/{{ $post->user->slug }}" class="text-decoration-none">{{ $post->user->name }}</a> in <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></h5>
      <p>{{ $post->excerpt }}</p>
      <a href="/posts/{{ $post->slug }}" class="text-decoration-none">Read more..</a>
    </article>
  @endforeach --}}
@endsection