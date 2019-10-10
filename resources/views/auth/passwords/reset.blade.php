@extends('layout.login')

@section('content')
<div class="card">
    <nav class="navbar navbar-expand-md navbar-light" style="background-color: rgba(0,0,0,.03); border-bottom: 1px solid rgba(0,0,0,.125);">
        <div class="container">
            <div class="navbar-brand row" style="font-size: 20px">
                {{ __('Gestão de Recadastramento') }}
            </div>

            <div class="row">
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Criar conta') }}</a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </nav>

    <div class="text-center">
        <br>
        <h3>Redefinir Senha</h3>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}" class="needs-validation" novalidate>
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group row">
                <!--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>-->
                <div class="col-md-12">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus placeholder="E-mail">

                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @else
                    <div class="invalid-feedback">
                        Por favor, insira um endereço de e-mail válido.
                    </div>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <!--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Nova Senha') }}</label>-->
                <div class="col-md-12 password">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Nova Senha">

                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @else
                    <div class="invalid-feedback">
                        Preencha este campo.
                    </div>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <!--<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirme sua nova senha') }}</label>-->
                <div class="col-md-12 password">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirme sua nova senha">
                    <div class="invalid-feedback">
                        Preencha este campo.
                    </div>
                </div>
            </div>

            <div class="form-group row mb-0">
                <!--<div class="col-md-6 offset-md-4">-->
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Resetar Senha') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection