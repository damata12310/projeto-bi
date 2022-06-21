@extends('painel.theme')
@section('conteudo')
    <div class="text">Nova Empresa</div>

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
                <th scope="col">CNPJ</th>
                <th scope="col">Chave Bling</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($empresas))
                @foreach($empresas as $empresa)
                    <tr>
                        <th scope="row">{{$empresa->id}}</th>
                        <td>{{$empresa->nome}}</td>
                        <td>{{$empresa->cnpj}}</td>
                        <td>{{$empresa->chaveBling}}</td>
                        <td><a href="{{url('/painel/editEmpresa/'.$empresa->id)}}"><i class='bx bx-edit'></i></a> </td>
                        <td><a href="{{url('/painel/deleteEmpresa/'.$empresa->id)}}"><i class='bx bx-x-circle'></i></a> </td>
                    </tr>
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
