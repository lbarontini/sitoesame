@extends('layouts.app')

@section('log_content')
<div class="container-contact">

    <h1>{{ __('Login') }}</h1>

    @if(Session::has('error'))
        <div class="alert">
            {{ Session::get('error')}}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="wrap-input">
            <div class="rs1-wrap-input">
                <label for="username" class="label-input">{{ __('Username') }}</label>

                <div class="col-md-6">
                    <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="rs1-wrap-input">
                <label for="password" class="label-input">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="rs1-wrap-input">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="label-input" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="container-form-btn">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="form-btn1">
                        {{ __('Login') }}
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
