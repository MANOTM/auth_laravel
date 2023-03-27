@extends('layouts.master')

@section('content')

<section class="">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
            class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-outline mb-4">
              <input type="email" name="email" id="form3Example3" class="form-control form-control-lg @error('email') is-invalid @enderror"
                placeholder="Email address" value="{{old('email')}}"/>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>

            <!-- Password input -->
            <div class="form-outline mb-3">
              <input type="password" name="password" id="form3Example4" class="form-control form-control-lg @error('password') is-invalid @enderror"
                placeholder="Password" />
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>

            <div class="d-flex justify-content-between align-items-center">
              <!-- Checkbox -->
              <div class="form-check mb-0">
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" ame="remember" id="remember" {{ old('remember') ? 'checked' : '' }}/>
                <label class="form-check-label" for="form2Example3">
                  Remember me
                </label>
              </div>
              @if (Route::has('password.request'))
                <a class="text-body" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
            </div>

            <div class="text-center text-lg-start mt-4 pt-2">
              <button type="submit" class="btn btn-primary btn-lg form-control"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
              <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="/register"
                  class="link-danger">Register</a></p>
            </div>

          </form>
        </div>
      </div>
    </div>
  </section>
@endsection
