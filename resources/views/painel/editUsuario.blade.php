@extends('painel.theme')
@section('conteudo')
    <div class="text">Editar Usuário: {{$user->name}}</div>
    <form class="" action="{{ route('editaUsuarioPost.painel') }}" method="POST" enctype="multipart/form-data">
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
            <input type="text" class="form-control" id="nome-usuario" name="name" value="{{$user->name}}">
            <input type="hidden" class="form-control" id="nome-usuario" name="id" value="{{$user->id}}">
        </div>

        <div class="form-group">
            <label for="nome-usuario">Senha</label>
            <input type="text" class="form-control" id="nome-usuario" name="password" value="" placeholder="*****">
        </div>

        <div class="form-group">
            <label for="cnpj">Empresa</label>
            <input type="text" class="form-control" id="" name="" value="{{$empresa->nome}}" readonly>
            <input type="hidden" class="form-control" id="empresa_id" name="empresa_id" value="{{$user->empresa_id}}" readonly>
        </div>

        <div class="form-group">
            <label for="nivelUsuario">Nível de Usuário</label>
            <select id="nivelUsuario" name="nivel">
                <option value="Master" {{$user->master == 1 ? 'selected': ''}}>Master</option>
                <option value="Soulog" {{$user->soulog == 1 ? 'selected': ''}}>Soulog</option>
                <option value="Cliente" {{$user->cliente == 1 ? 'selected': ''}}>Cliente</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@stop
