@extends('layouts.app')

@section('content')
<div style="background-color: #f4f2f9; min-height: 75vh; padding-top: 8vh;">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            
            <div class="col-md-12 text-center mb-4" style="font-family: 'Poppins', sans-serif; font-weight: 400;">
                <h1 class="display-4" style="font-weight: 900;">Website Name</h1>
               
            </div>

          {{-- =================== --}}
            <div class="col-md-8 col-lg-6 d-flex justify-content-center">
                <div class="card" style="width: 100%; max-width: 400px; box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);">
                    <div class="card-header text-center">{{ __('Register') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-3 row">
                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" 
                                    value="{{ old('name') }}" placeholder="User Name" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-12"> 
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Valid Email" required autocomplete="email"> 
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="mb-3 row">
                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Valid Password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary w-100 btn-lg">
                                        {{ __('Register') }}
                                    </button>
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
