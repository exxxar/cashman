@extends('layouts.layout')
@section('title')
   Восстановление пароля
@endsection
@section('content')
    <!-- App Header -->
    <div class="appHeader no-border transparent position-absolute">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle"></div>
        <div class="right">
        </div>
    </div>
    <!-- * App Header -->
    <!-- App Capsule -->
    <div id="appCapsule">
        <div class="section mt-2 text-center">
            <h1>Восстановление пароля</h1>
            <h4>Введите ваш новый пароль</h4>
        </div>
        <div class="section mb-5 p-2">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="card">
                    <div class="card-body pb-1">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label for="email" class="label">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"
                                       autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group basic">
                            <label for="password" class="label">{{ __('Password') }}</label>
                            <div class="input-wrapper">
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group basic">
                            <label for="password-confirm" class="label">{{ __('Confirm Password') }}</label>
                            <div class="input-wrapper">
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-button-group transparent">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Сменить пароль</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
