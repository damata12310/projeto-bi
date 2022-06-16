@extends('painel.theme')
@section('conteudo')
    <div class="text">Novo Usuário</div>
    <form class="" action="{{ route('criaUsuario.painel') }}" method="POST" enctype="multipart/form-data">
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
            <label for="nome-usuario">Nome</label>
            <input type="text" class="form-control" id="nome-usuario" name="name">
        </div>

        <div class="form-group">
            <label for="empresa">Empresa</label>
            <select id="empresa" name="empresa_id">
                @if(isset($empresas))
                    @foreach($empresas as $empresa)
                        <option value="{{$empresa->id}}">{{$empresa->nome}}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="form-group">
            <label for="E-mail">E-mail</label>
            <input type="text" class="form-control" id="E-mail" name="email">
        </div>

        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="text" class="form-control" id="senha" name="password">
        </div>

        <div class="form-group">
            <label for="nivelUsuario">Nível de Usuário</label>
            <select id="nivelUsuario" name="nivel">
                <option value="Master">Master</option>
                <option value="Soulog">Soulog</option>
                <option value="Cliente">Cliente</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@stop
