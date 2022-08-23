@extends('dashboard.layouts.main')

@section('container')
<div class="container">
  <div class="row my-3">
    <div class="col-md-8">
      <h2>{{ $post->title }}</h2>
      <a href="/dashboard/posts" class="text-decoration-none btn btn-success"><span data-feather="arrow-left"></span> ke halaman dashboard</a>
      <a href="" class="text-decoration-none btn btn-warning"><span data-feather="edit"></span> Edit</a>
      <a href="" class="text-decoration-none btn btn-danger"><span data-feather="trash-2"></span> Delete</a>

      <img src="https://source.unsplash.com/random/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid my-3">

      <article class="text-justify">
        {!! $post->body !!}
      </article>
    </div>
  </div>
</div>
@endsection