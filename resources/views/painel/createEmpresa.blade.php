@extends('painel.theme')
@section('conteudo')
    <div class="text">Nova Empresa</div>
        <form class="" action="{{ route('criaEmpresa.painel') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{--        @method('PUT')--}}
            {{--        @include('flash::message')--}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if(session('sucess'))
                <div class="alert alert-success">
                    {{ session('sucess') }}
                </div>
            @endif
            <div class="form-group">
                <label for="nome-empresa">Nome da empresa</label>
                <input type="text" class="form-control" id="nome-empresa" name="nome">
            </div>

            <div class="form-group">
                <label for="cnpj">CNPJ</label>
                <input type="text" class="form-control" id="cnpj" name="cnpj">
            </div>

            <div class="form-group">
                <label for="chaveBling">Chave Bling</label>
                <input type="text" class="form-control" id="chaveBling" name="chaveBling">
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
@stop
