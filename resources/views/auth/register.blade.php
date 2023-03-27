@extends('layouts.master')

@section('content')
<section class="">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
            class="img-fluid" alt="Phone image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <form method="POST" action="{{ route('register') }}">
                @csrf
            <div class="form-outline mb-4">
              <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Your Name" required autocomplete="name" autofocus />
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>

            <!-- Password input -->
            <div class="form-outline mb-3">
              <input type="email" name="email" id="form3Example4" class="form-control form-control-lg @error('email') is-invalid @enderror"
                placeholder="Email Address" value="{{old('email')}}"/>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input id="password" type="password" placeholder="Password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password">
                </div>
                </div>
              </div>


            <div class="text-center text-lg-start mt-4 pt-2">
              <button type="submit" class="btn btn-primary btn-lg form-control"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
              <p class="small fw-bold mt-2 pt-1 mb-0">Already Have a Account? <a href="/login"
                  class="link-danger">Login</a></p>
            </div>

          </form>
        </div>
      </div>
    </div>
  </section>

@endsection





