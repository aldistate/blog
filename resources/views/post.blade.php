@extends('layouts.main')

@section('container')
  <div class="container">
    <div class="row justify-content-center mt-3">
      <div class="col-md-8">
        <h2>{{ $post->title }}</h2>

        <p>By: <a href="/blog?user={{ $post->user->slug }}" class="text-decoration-none">{{ $post->user->name }}</a> in <a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>

        @if ($post->image)
          <div style="max-height: 350px; max-width: 1200px; overflow: hidden;" class="my-3">
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
          </div>
        @else
          <img src="https://source.unsplash.com/random/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid my-3">
        @endif

        <article class="text-justify">
          {!! $post->body !!}
        </article>

        <a href="/blog" class="text-decoration-none d-block my-4">Kembali</a>
      </div>
    </div>
  </div>
@endsection