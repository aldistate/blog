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

      {{-- kondisi jika ada image didalam database maka pakai yg ada di database, jika tidak, tetap pakai API Unsplash --}}
      @if ($post->image)
        <div style="max-height: 350px; max-width: 1200px; overflow: hidden;" class="my-3">
          <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid my-3">
        </div>
      @else
        <img src="https://source.unsplash.com/random/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid my-3">
      @endif

      <article class="text-justify">
        {!! $post->body !!}
      </article>
    </div>
  </div>
</div>
@endsection