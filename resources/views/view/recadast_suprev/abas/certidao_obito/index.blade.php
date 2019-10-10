@extends('layout.default')

@section('titulo', 'Recadastramento | Sistema Gestão de Recadastramento')

@section('conteudo')

<div class="page-content-wrapper">

    <div class="page-content">

        <div class="page-head">
            <div class="page-title">
                <h1>Recadastramento</h1>
            </div>
        </div>

        @if (session('msg')) {!! session('msg') !!} @endif

        <div class="row">
            <div class="col-md-12 ">

                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-settings font-green"></i>
                            <span class="caption-subject font-green bold uppercase">Lista de Cadastrados</span>
                        </div>

                    </div>
                    <div class="portlet-body">
                        <object>

                        </object>
                        

                     

                    </div>

                </div>
            </div>

        </div>
    </div>

</div>



@endsection()