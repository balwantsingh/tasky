@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <form class="col-md-4 position-absolute top-50 start-50 translate-middle" method="POST"
            action="{{ route('login') }}">
            @csrf
            <div class="col-12 fs-3 fw-bold mb-3">Sign in to Tasky</div>
            <div class="form-floating mb-3">
                <input type="email" id="email" class="form-control form-control-xl @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" placeholder="name@example.com" required
                    autocomplete="email" autofocus>
                <label for="email">{{ __('E-Mail Address') }}</label>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input id="password" type="password"
                    class="form-control form-control-xl @error('password') is-invalid @enderror" name="password"
                    placeholder="Password" required autocomplete="current-password">
                <label for="password">{{ __('Password') }}</label>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-12 mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
            <div class="col-12 d-grid gap-2">
                <button type="submit" class="btn btn-xl btn-pink">{{ __('Sign in') }}</button>
                @if(Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection
