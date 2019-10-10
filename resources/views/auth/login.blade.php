@extends('layout.login')

@section('content')


<div class="card">
    <!--<div class="card-header">{{ __('Acesse sua conta') }}</div>-->
    <nav class="navbar navbar-expand-md navbar-light" style="background-color: rgba(0,0,0,.03); border-bottom: 1px solid rgba(0,0,0,.125);">
        <div class="container">
            <div class="navbar-brand row" style="font-size: 20px">
                {{ __(' Sistema Gestão de Recadastramento ') }}
            </div>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav row">
                <!--<li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                            </li>-->
                <!-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Criar de conta') }}</a>
                </li> -->
            </ul>
        </div>
    </nav>

    <div class="text-center">
        <br>
        <h3>Acesse sua conta</h3>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}" class="needs-validation" novalidate>
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
            <div class="form-group row">

                <div class="col-md-12">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Senha">
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
            <!--<div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>-->

            <div class="row  mb-0">
                <div class="col-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Entrar') }}
                    </button>
                </div>
                <div class="col-8">
                    <div class="text-right">
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Esqueceu sua senha?') }}
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection