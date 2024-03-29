@extends('dashboard.layouts.main')

{{-- halaman create new post --}}
@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Post</h1>
  </div>

  <div class="col-lg-8">
    <form method="POST" action="/dashboard/posts" enctype="multipart/form-data">
      @csrf
      {{-- inputan title --}}
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required autofocus>
          @error('title')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
      </div>
      {{-- inputan slug --}}
      <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}" required>
          @error('slug')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
      </div>
      {{-- inputan category --}}
      <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <select class="form-select" name="category_id">
          @foreach ($categories as $category)
            @if (old('category_id') == $category->id)
              <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
            @else
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endif
          @endforeach
        </select>
      </div>
      {{-- inputan file --}}
      <div class="mb-3">
        <label for="image" class="form-label">Post Image</label>
        {{-- preview image sebelum di post --}}
        <img class="img-preview img-fluid mb-3 col-sm-5">
        {{-- membuat function javascript previewImage() --}}
        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
          @error('image')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
      </div>
      {{-- inputan body --}}
      <div class="mb-3">
        <label for="body" class="form-label">Body</label>
        <input id="body" type="hidden" name="body" value="{{ old('body') }}">
          @error('body')
            <p class="text-danger">{{ $message }}</p>
          @enderror
        <trix-editor input="body"></trix-editor>
      </div>
      <button type="submit" class="btn btn-primary">Create Post</button>
    </form>
    <a href="/dashboard/posts" class="text-decoration-none btn btn-success my-3"><span data-feather="arrow-left"></span> kembali ke halaman dashboard</a>
  </div>

  <script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function () {
      fetch('/dashboard/posts/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });

    // menghilangkan fungsi dari toolbar upload file dari trix editor
    document.addEventListener('trix-file-accept', function (e) {
      e.preventDefault();
    })

    // function previewImage() untuk mereview sebuah image sebelum di post
    function previewImage() {
      const image = document.querySelector('#image');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
      }
    }
  </script>
@endsection