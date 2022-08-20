@extends('layouts.main')

@section('container')
<h1 class="mb-5 text-center">Halaman Users</h1>
  @foreach ($users as $user)
    <article>
      <h2>
        <ul>
          <li><a href="/blog?user={{ $user->slug }}" class="text-decoration-none">{{ $user->name }}</a></li>
        </ul>
      </h2>
    </article>
  @endforeach
@endsection