@extends('layout.login')

@section('content')
<div class="card">
    <!--<div class="card-header">{{ __('Cadastre-se') }}</div>-->
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
                <!--<li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Criar conta') }}</a>
                            </li>-->
            </ul>
        </div>
    </nav>

    <div class="text-center">
        <br>
        {{-- <h3>Cadastre-se</h3> --}}
        <h3>Solicitar criação de conta</h3>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}" class="needs-validation" novalidate>
            @csrf

            <div class="form-group row">
                <div class="col-sm-12">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Nome">

                    @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @else
                    <div class="invalid-feedback">
                        Preencha este campo.
                    </div>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-12">
                    <div id="load_email">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="E-mail" onchange="consultaCampo(this.value, this.id, 'Este endereço de email já está em uso. Tente outro.');">
                        <div style="color: #e73d4a; font-size: 12.8px;" id="msg_valida_email"></div>
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
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 mb-3 password">
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
                <div class="col-md-6 mb-3 password">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirme sua senha">
                    <div class="invalid-feedback">
                        Preencha este campo.
                    </div>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 mb-3 cpf">
                    <div id="load_cpf">
                        <input id="cpf" type="text" class="form-control" name="cpf" required placeholder="CPF" maxlength="14" onchange="consultaCampo(this.value, this.id, 'CPF já cadastrado');">
                        <div style="color: #e73d4a; font-size: 12.8px;" id="msg_valida_cpf"></div>
                        <div class="invalid-feedback">
                            Preencha este campo.
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div id="load_matricula">
                        <input id="matricula" type="text" class="form-control" name="matricula" required placeholder="Matrícula" onchange="consultaCampo(this.value, this.id, 'Matrícula já cadastrada');">
                        <div style="color: #e73d4a; font-size: 12.8px;" id="msg_valida_matricula"></div>
                        <div class="invalid-feedback">
                            Preencha este campo.
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <select class="orgao form-control" id="id_orgao" name="id_orgao" required>
                        <option value="">--Selecione--</option>
                        @foreach($orgaos as $o)
                            @if ($o->ativo == 'S')
                            <option value="{{ $o->id }}">{{ $o->nome }}</option>
                            @endif
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Preencha este campo.
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <select id="id_vinculo_empregaticio" name="id_vinculo_empregaticio" class="vinculo_empregaticio form-control" id="orgao" name="orgao" required>
                        <option value="">--Selecione--</option>
                        @foreach($vinculo_empregaticio as $ve)
                            @if ($ve->ativo == 'S')
                            <option value="{{ $ve->id }}" {{ (isset($registros->id_vinculo_empregaticio) && $registros->id_vinculo_empregaticio == $ve->id) ? 'selected' : '' }}>{{ $ve->nome }}</option>
                            @endif
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Preencha este campo.
                    </div>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-7 mb-3">
                    <input id="funcao" type="text" class="form-control" name="funcao" required placeholder="Função">
                    <div class="invalid-feedback">
                        Preencha este campo.
                    </div>
                </div>
                <div class="col-md-5 mb-3">
                    <input id="telefone" type="text" class="form-control" name="telefone" required placeholder="Telefone" maxlength="15">
                    <div class="invalid-feedback">
                        Preencha este campo.
                    </div>
                </div>
            </div>

            <div class="row mb-0">
                <!--<div class="col-md-6 offset-md-4">-->
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