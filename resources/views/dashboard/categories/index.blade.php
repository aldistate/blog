@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Post Categories</h1>
  </div>

  <div class="table-responsive">
    <a href="/dashboard/categories/create" class="btn btn-primary mb-3">Create New Post Categories</a>
    {{-- kondisi jika data berhasil ditambahkan --}}
    @if (session()->has('sukses'))
      <div class="alert alert-success col-lg-3 text-center" role="alert">
        <span data-feather="check"></span> {{ session('sukses') }}
      </div>
    @endif
    <table class="table table-striped table-sm text-center">
      <caption>List of post</caption>
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Category Name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $category->name }}</td>
          <td>
            <a href="/dashboard/categories/{{ $category->slug }}" class="badge bg-info mx-1"><span data-feather="eye"></span></a>
            <a href="/dashboard/categories/{{ $category->slug }}/edit" class="badge bg-warning mx-1"><span data-feather="edit"></span></a>
            <form action="/dashboard/categories/{{ $category->slug }}" method="POST" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Apa anda yakin ingin menghapusnya?')"><span data-feather="trash-2"></span></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection