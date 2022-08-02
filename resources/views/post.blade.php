@extends('layouts.main')

@section('container')
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-8">
        <h2>{{ $post->title }}</h2>

        <p>By: <a href="#" class="text-decoration-none">{{ $post->user->name }}</a> in <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>

        <img src="https://source.unsplash.com/random/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid my-3">

        <article class="text-justify">
          {!! $post->body !!}
        </article>

        <a href="/blog" class="text-decoration-none d-block my-4">Kembali</a>
      </div>
    </div>
  </div>
@endsection