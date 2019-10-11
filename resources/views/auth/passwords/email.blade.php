@extends('layout.login')

@section('content')
<div class="card">
    <!--<div class="card-header">{{ __('Redefinir Senha') }}</div>-->

    <nav class="navbar navbar-expand-md navbar-light" style="background-color: rgba(0,0,0,.03); border-bottom: 1px solid rgba(0,0,0,.125);">
        <div class="container">
            <div class="navbar-brand row" style="font-size: 20px">
                {{ __('Carta de Serviço') }}
            </div>

            <div class="row">
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav">
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Solicitar criação de conta') }}</a>
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
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}" class="needs-validation" novalidate>
            @csrf

            <div class="form-group row">
                <div class="col-md-12">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="E-mail">

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

            <div class="form-group row mb-0">
                <div class="col-4">
                    <button type="button" id="voltar" class="btn btn-secondary">
                        {{ __('Voltar') }}
                    </button>
                </div>

                <div class="col-8">
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Enviar') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection