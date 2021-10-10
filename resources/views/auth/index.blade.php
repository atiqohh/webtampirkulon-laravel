@extends('auth.layouts.main')

@section('container')

<div class="container">

  @if (session()->has('LoginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('LoginError') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <main class="form-signin">
    <div class="login">
      <form action="/login" method="post">
        @csrf
        <img class="mb-4" src="/img/logo-large.png" alt="" height="200">
        <h4 class="mb-3">Selamat Datang Admin</h4>
        <h6 class="mb-3 fw-normal">Silahkan Login!!</h6>

        <div class="form-floating">
          <input type="email" class="form-control @error('email') is-invalid  @enderror" name="email" id="email" placeholder="name@example.com" value="{{ old('email') }}" autofocus required>
          <label for="email">Email</label>
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
          <label for="password">Password</label>
        </div>
  
        <button class="w-100 btn btn-primary" type="submit">Login</button>
      </form>    
    </div>
  </main>
</div>

@endsection