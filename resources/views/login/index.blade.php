@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-4">

        <main class="form-signin">
            <h1 class="h3 mb-3 fw-normal text-center">Please login</h1>

            @if(session()->has('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

            @elseif(session()->has('loginError'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              
            @endif
      
            <form action="/login" method="post">
              @csrf
              <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ old ('email') }}">
                <label for="email" autofocus>Email address</label>
                @error('email')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                @enderror
              </div> 
              <div class="form-floating">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                <label for="password" required >Password</label>
              </div>

              <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
              <small class="d-block text-center mt-3">Not Registered? <a href="/register">Register Now !</a></small>
            </form>
        </main>

    </div>
</div>

@endsection