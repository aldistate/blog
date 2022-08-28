@extends('dashboard.layouts.main')

@section('container')
<div class="container">
  <div class="row my-3">
    <div class="col-md-8">
      <h2>{{ $post->title }}</h2>
      <a href="/dashboard/posts" class="text-decoration-none btn btn-success"><span data-feather="arrow-left"></span> kembali ke halaman dashboard</a>
      <a href="/dashboard/posts/{{ $post->slug }}/edit" class="text-decoration-none btn btn-warning"><span data-feather="edit"></span> Edit</a>
      <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
        @method('delete')
        @csrf
        <button class="btn btn-danger" onclick="return confirm('Apa anda yakin ingin menghapusnya?')"><span data-feather="trash-2"></span> Delete</button>
      </form>

      <img src="https://source.unsplash.com/random/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid my-3">

      <article class="text-justify">
        {!! $post->body !!}
      </article>
    </div>
  </div>
</div>
@endsection