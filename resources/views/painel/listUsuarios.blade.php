@extends('painel.theme')
@section('conteudo')
    <div class="text">Listagem de usuários</div>

    <div class="">
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Empresa</th>
            <th scope="col">E-mail</th>
            <th scope="col">Tipo de usuário</th>
            <th scope="col">Editar</th>
            <th scope="col">Excluir</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($users))
            @foreach($users as $user)
                @foreach($empresas as $empresa)
                    @if($user->empresa_id == $empresa->id)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$empresa->nome}}</td>
                            <td>{{$user->email}}</td>

                            @if($user->master == 1)
                                <td>Master</td>
                            @elseif($user->soulog == 1)
                                <td>Soulog</td>
                            @else
                                <td>Cliente</td>
                            @endif
                            <td><a href="{{url('/painel/editaUsuario/'.$user->id)}}"><i class='bx bx-edit'></i></a> </td>
                            <td><a href="{{url('/painel/deleteUsuario/'.$user->id)}}"><i class='bx bx-x-circle'></i></a> </td>
                        </tr>
                    @endif
                @endforeach
            @endforeach
        @else
            <tr>
                <th scope="row">0</th>
                <td><h3>Nenhum dado disponível</h3></td>
                <td><h3>...</h3></td>
                <td><h3>...</h3></td>
                <td><h3>...</h3></td>
                <td><h3>...</h3></td>
            </tr>
        @endif
        </tbody>
    </table>
@stop
