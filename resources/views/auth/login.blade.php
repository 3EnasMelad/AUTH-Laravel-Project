@extends('layouts.app')

@section('content')
<div style="background-color: #f4f2f9; min-height: 75vh; padding-top: 8vh;">
    <div class="container">
        <div class="row align-items-center justify-content-center gap-2">
           
            <div class="col-md-5 text-start" style="font-family: 'Poppins', sans-serif; font-weight: 400; padding-right: 10px;">
                <h1 class="display-4" style="font-weight: 900;">Web Site Name</h1>
                <p class="lead" style="font-weight: 600;">Welcome to our website! Please log in<br> to access your account.</p>
            </div>

           
            <div class="col-md-5 d-flex justify-content-center mt-0" style="padding-left: 10px;">
                <div class="card shadow-lg" style="width: 100%; max-width: 400px; box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);">
                    <div class="card-header text-center" style="font-weight: bold;">{{ __('Login') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3 row">
                                <div class="col-md-12">
                                    <input id="email" type="email" placeholder="your email" class="form-control @error('email') is-invalid @enderror w-100" name="email" value="{{ old('email') }}" required autocomplete="off" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-12">
                                    <input id="password" placeholder="your password" type="password" class="form-control @error('password') is-invalid @enderror w-100" name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                           
                            <div class="mb-3 row">
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="row mb-0">
                                <div class="col-md-12">
                                    <button type="submit"   class="btn btn-primary w-100 btn-lg">
                                        {{ __('Login') }}
                                    </button>
                                    @if (Route::has('password.request'))
                                        <a style="text-decoration: none" class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer style="background-color: white; height: 60px;" class="text-center py-2 mt-4">
    <p class="mb-0" style="font-size: 0.9rem; color:black;">&copy; 2024 Web Site Name. All rights reserved.</p>
</footer>

@endsection
