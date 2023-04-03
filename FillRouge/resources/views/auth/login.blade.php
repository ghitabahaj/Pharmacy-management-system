@extends('layouts.app')

@section('content')
<div class="container h-100">
    <div class="row justify-content-center align-items-center h-100">
            <div class="card col-lg-5  col-md-6 col-11 m-auto shadow rounded py-4">
                <div class=" m-auto d-block w-100 text-center fw-bold fs-3 mycolor border-bottom-0" style="border-radius: 5px 5px 0px 0px ;">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" class="">
                        @csrf

                        <div class="w-100 my-3 mb-5">
                            <h3 class="text-center">Welcome Back</h3>
                            <p class="text-center text-secondary">login with your details to continue</p>
                        </div>

                        <div class="row d-flex flex-column my-3 col-9 m-auto ">
                            <label for="email" class="mb-2">{{ __('Email') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror border-0 shadow-sm p-2" style="border: 0.3px solid black;" placeholder="Your Email Adrress" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="d-flex flex-column my-3 col-9 m-auto">
                            <label for="password" class="mb-2">{{ __('Password') }}</label>
                                <input id="password" type="password" class=" form-control @error('password') is-invalid @enderror border-0 shadow-sm p-2" style="border: 0.3px solid black;"  placeholder="Enter Your Password" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input ms-1" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label text-center ms-3" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="text-center">
                                <button type="submit" style="width: 45%;" class="my-2 mb-4 text-center  border-0 rounded button1 py-1 mycolor m-auto">
                                    {{ __('Login') }}
                                </button>
                                <button type="submit" style="width: 45%;" class="my-2 mb-4 text-center   myborder rounded py-1 mycolor  m-auto">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </button>
                                

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link d-block text-center" href="{{ route('password.request') }}">
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
@endsection
