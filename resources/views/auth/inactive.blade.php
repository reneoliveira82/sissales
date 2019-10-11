@extends('layout.login')

@section('content')


<div class="card">
    <!--<div class="card-header">{{ __('Acesse sua conta') }}</div>-->
    <nav class="navbar navbar-expand-md navbar-light" style="background-color: rgba(0,0,0,.03); border-bottom: 1px solid rgba(0,0,0,.125);">
        <div class="container">
            <div class="navbar-brand row" style="font-size: 20px">
                {{ __('Carta de Serviço') }}
            </div>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav row">
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Solicitar criação de conta') }}</a>
                </li> --}}
            </ul>
        </div>
    </nav>

    <div class="text-center">
        <br>
        <h3>Conta Inativa</h3>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}" class="needs-validation" novalidate>
            @csrf

        
            <div class="col-md-12 alert alert-warning" role="alert" style="text-align: justify">
                No momento seu usuário não possui uma conta ativa. Aguarde a ativação ou entre em contato com o gestor da carta.
            </div>            

            <div class="row  mb-0" style="padding-top: 15px">
                <div class="col-4">
                    <button type="button" id="voltar" class="btn btn-secondary">
                        {{ __('Voltar') }}
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>


@endsection