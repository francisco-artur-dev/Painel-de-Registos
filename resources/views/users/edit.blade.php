@extends('layouts.admin')

@section('conteudo da página')
    <div class="card mt-4 mb-4 border-light shadow">
            <div class="card-header">
                <a href="{{ route('users.index') }}" class="btn btn-info btn-sm">Listar usuários</a>
                <a href="{{ route('users.show', ['user' => $user->id]) }}" class="btn btn-primary btn-sm">Visualizar Usuário</a>
            </div>
        </div>

        <div class="card-body">
            <h2 class="mb-4">Editar Usuário</h2>
            <x-alert />

            <form action="{{ route('users.update', ['user' => $user->id]) }}" method="post">
                @csrf
                @method('PUT')

                <div class="col-md-6">
                    <label for="name" class="form-label">Nome:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome Do Usuário"  value="{{old ('name', $user->name)}}">
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">E-mail:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="E-mail do Usuário" value="{{old ('email', $user->email)}}">
                </div>

                <div class="col-md-6">
                    <label for="password" class="form-label">Senha:</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Senha com minimo de 6 caracteres" value="{{old ('password')}}">
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-warning  mt-2">Editar</button>
                </div>

            </form>
        </div>
    </div>

@endsection
