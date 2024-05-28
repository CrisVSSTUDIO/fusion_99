@extends('layouts.app')

@section('content')

<section>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center ">

            <div class="col-xl-6 ">
                <div class="container text-center">
                    <h1 class="display-5 fw-bold text-warning">Acesso Restrito</h1>
                    <p class="lead text-muted mb-4">Precisa de inicar sessão para aceder a todas<br> as funcionalidades da aplicação</p>
                </div>
                <img src="{{ asset('assets\icon\kira_2d.svg') }}" class="img-fluid mb-3 shadow   rounded" alt="Kira" loading="lazy">
            </div>
            <div class=" col-xl-6 ">
                <div class="card  shadow border-0  roundedm-3">
                    <div class="card-body ">
                        <form method="POST" action="{{ route('login') }}" >
                            <h4 class="text-uppercase text-center p-3">{{ __('Login') }}</h4>

                            @csrf
                            <!-- Email input -->
                            <div class="form-outline p-2">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <label class="form-label" for="form1Example13">{{ __('Email Address') }}</label>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <!-- Password input -->
                            <div class="form-outline p-2">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <label class="form-label" for="form1Example23">{{ __('Password') }}</label>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-around align-items-center mb-4">
                                <!-- Checkbox -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>

                            <div class="form-floating mb-3 text-center">
                                <button type="submit" class="btn btn-primary w-100 mb-4 ">
                                    {{ __('Login') }}
                                </button>
                            </div>
                            <p class="mt-4 text-center">¿Ainda não tem conta? <a href="{{ route('register') }}">Crie uma agora.</a> </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection