@extends('layouts.app')

@section('content')
<div class="container h-100" >
    <div class="row justify-content-center align-items-center h-100">
            <div class="card col-lg-5  col-md-6 col-11 m-auto shadow rounded py-4">
                <div class=" m-auto d-block w-100 text-center fw-bold fs-3 mycolor border-bottom-0" style="border-radius: 5px 5px 0px 0px ;">{{ __('Register') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }} " id="RegisterForm">
                        @csrf
                        <div class="w-100 my-3 mb-2">
                           <h3 class="text-center">Let's Get Started</h3>
                           <p class="text-center text-secondary">add your personal details to continue</p>
                        </div>
                        <div class="d-flex flex-column my-2 col-9 m-auto">
                            <label for="name" class="mb-2">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror border-0 shadow-sm p-2" name="name"  placeholder="Your Name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="d-flex flex-column my-2 col-9 m-auto">
                            <label for="email" class="mb-2">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror border-0 shadow-sm p-2" name="email" value="{{ old('email') }}" placeholder="Email Address" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                        
                        </div>

                        <div class="d-flex flex-column my-3 col-9 m-auto">
                            <label for="password" class="mb-2">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror border-0 shadow-sm p-2" name="password" placeholder="Enter Your Password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                       
                        </div>

                        <div class="d-flex flex-column my-3 col-9 m-auto">
                            <label for="password-confirm" class="mb-2">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control border-0 shadow-sm p-2" name="password_confirmation" placeholder="Confirm Your Password" required autocomplete="new-password">
                        </div>

                        <div class="w-100 d-flex flex-column justify-content-center">
                            <div class="d-flex justify-content-between col-9 m-auto">
                                <button type="submit" style="width: 45%;" class="my-2 mb-4 text-center  border-0 rounded button1 py-1 mycolor m-auto">
                                    {{ __('Register') }}
                                </button>
                                <button style="width: 45%;" class="my-2 mb-4 text-center bg-white  myborder rounded py-1 mycolor  m-auto" id="reset-form">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>
@endsection
