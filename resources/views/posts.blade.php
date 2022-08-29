@extends('layouts.main')

@section('container')
<h1 class="mb-4 text-center">{{ $title }}</h1>

<div class="row mb-3 justify-content-center">
  <div class="col-md-6">
    <form action="/blog" method="GET">
      @if (request('category'))
          <input type="hidden" name="category" value="{{ request('category') }}">
      @endif
      @if (request('user'))
          <input type="hidden" name="user" value="{{ request('user') }}">
      @endif
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
        <button class="btn btn-primary" type="submit">Search</button>
      </div>
    </form>
  </div>
</div>

{{-- hero --}}
@if ($posts->count())
  <div class="card mb-3 border-dark">
    {{-- kondisi jika ada image didalam database maka pakai yg ada di database, jika tidak, tetap pakai API Unsplash --}}
    @if ($posts[0]->image)
      <div style="max-height: 350px; max-width: 1200px; overflow: hidden;">
        <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->category->name }}" class="card-img-top">
      </div>
    @else
      <img src="https://source.unsplash.com/random/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
    @endif
    <div class="card-body text-center bg-dark text-light">
      <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none">{{ $posts[0]->title }}</a></h3>
      <p>
        <small class="text-muted">
          By: <a href="/blog?user={{ $posts[0]->user->slug }}" class="text-decoration-none">{{ $posts[0]->user->name }}</a> in <a href="/blog?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}
        </small>
      </p>
      <p class="card-text">{{ $posts[0]->excerpt }}</p>
      <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>
    </div>
  </div>

{{-- list --}}
<div class="container mt-5">
  <div class="row">
    @foreach ($posts->skip(1) as $post)
    <div class="col-md-4 mb-4">
      <div class="card" style="width: 18rem;">
        <div class="position-absolute p-1" style="background-color: rgba(0, 0, 0, 0.5);">
          <a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none text-light">{{ $post->category->name }}</a>
        </div>
        {{-- kondisi jika ada image didalam database maka pakai yg ada di database, jika tidak, tetap pakai API Unsplash --}}
        @if ($post->image)
          <div style="max-height: 300px; max-width: 500px; overflow: hidden;">
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="card-img-top">
          </div>
        @else
          <img src="https://source.unsplash.com/random/500x300?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
        @endif
        <div class="card-body">
          <h5 class="card-title"><a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a></h5>
          <p>
            <small class="text-muted">
              By: <a href="/blog?user={{ $post->user->slug }}" class="text-decoration-none">{{ $post->user->name }} </a>{{ $post->created_at->diffForHumans() }}
            </small>
          </p>
          <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

@else
  <p class="text-center fs-3">No Post Found</p>
@endif

{{-- Pagination --}}
<div class="d-flex justify-content-center">
  {{ $posts->links() }}
</div>

@endsection