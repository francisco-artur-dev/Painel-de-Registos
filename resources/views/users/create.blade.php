@extends('layouts.admin')

@section('conteudo da página')
    <div class="card mt-4 mb-4 border-light shadow">

        <div class="card-header hstack gap-2">
            <span> Cadastrar Usuário </span>

            <span class="ms-auto">
                <a href="{{ route('users.index') }}" class="btn btn-info btn-sm ">Listar Usuários</a>
            </span>
        </div>
        <div class="card-body">
            <x-alert />

            <form action="{{ route('users.store') }}" class="row g-3" method="post" style="display:inline">
                @csrf

                <div class="col-md-6">
                    <label for="name" class="form-label">Nome:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome Do Usuário"  value="{{old ('name')}}">
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">E-mail:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="E-mail do Usuário" value="{{old ('email')}}">
                </div>

                <div class="col-md-6">
                    <label for="password" class="form-label">Senha:</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Senha com minimo de 6 caracteres" value="{{old ('password')}}">
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-success btn-sm">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
