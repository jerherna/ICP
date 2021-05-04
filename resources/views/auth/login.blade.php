@extends('layouts.customlogin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 vertical-center">
            <div class="mx-auto">
                <img class="img-fluid pb-4 logo-fill center" style="max-width: 300px; horizontal-align: center;" src="{{ asset('img/interlink_logo.png') }}" alt="" />
            </div>
            <!--<h3 class="py-3 text-center">Interlink Church Portal</h3>-->
            <div class="card mx-auto" style="width:65%">
                <!--<div class="card-header">{{ __('Login') }}</div>-->
                <div class="card-header text-center">
                    <h3>
                        Interlink Church Portal Login
                    </h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!--
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        -->
                        <div class="form-group row py-3">
                            <div class="col-md-6 offset-md-3">
                                <a href="{{route('login.google')}}" class="btn btn-danger btn-block"><i class="fab fa-google fa-2x pr-4 "></i>Login with Google</a>
                                <a href="{{route('login.facebook')}}" class="btn btn-primary btn-block"><i class="fab fa-facebook-f fa-2x pr-4 "></i>Login with Facebook</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <p class="py-5 center-footer text-center">Interlink Business Solutions Inc. {{ now()->year }}</p>
        </div>
    </div>
</div>
@endsection
