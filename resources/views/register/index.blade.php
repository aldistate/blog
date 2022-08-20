@extends('layouts.main')

@section('container')
  <div class="row justify-content-center">
    <div class="col-md-6">
      <main class="form-registration w-100 m-auto">
        <h1 class="h3 mb-4 fw-normal text-center">Register Form</h1>
        <form action="/register" method="POST">
          @csrf
          <div class="form-floating">
            <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
            <label for="name">Name</label>
            @error('name')
              <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="text" name="slug" class="form-control rounded-top @error('slug') is-invalid @enderror" id="slug" placeholder="slug" required value="{{ old('slug') }}">
            <label for="slug">Username</label>
            @error('slug')
              <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
            <label for="email">Email address</label>
            @error('email')
              <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
            <label for="password">Password</label>
            @error('password')
              <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
        </form>
        <small class="d-block text-center mt-3">Already Registered?  <a href="/login">Login</a></small>
        <p class="mt-2 mb-3 text-muted text-center">&copy; 2022</p>
      </main>
    </div>
  </div>
@endsection