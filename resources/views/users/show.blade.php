@extends('layouts.admin')

@section('conteudo da página')
<div class="card mt-4 mb-4 border-light shadow">

    <div class="card-header d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-2">
        <span>Visualizar Usuário</span>
        <span class="d-flex flex-wrap gap-2 mt-2 mt-sm-0">
            <a href="{{ route('users.index') }}" class="btn btn-info btn-sm">Listar</a>
            <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-warning btn-sm">Editar</a>
            <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"
                onclick="return confirm('Tem certeza que deseja deletar este usuário?')">Deletar</button>
            </form>
        </span>
    </div>

    <div class="card-body">
        <x-alert />

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Data de cadastro</th>
                        <th scope="col">Data de atualização</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i:s') }}</td>
                        <td>{{ \Carbon\Carbon::parse($user->updated_at)->format('d/m/Y H:i:s') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
