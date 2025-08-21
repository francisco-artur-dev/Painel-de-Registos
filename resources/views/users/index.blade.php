@extends('layouts.admin')

@section('conteudo da página')

    <div class="card mt-4 mb-4 border-light shadow">

        <div class="card-header hstack gap-2">

            <span>Lista de Usuários</span>

            <span class="ms-auto">
                <a href="{{ route('users.create') }}" class="btn btn-success btn-sm">Cadastrar Usuário</a>
            </span>
            
        </div>

        <div class="card-body">
            <x-alert />
<div class="table-responsive">
    <table class="table table-striped align-middle">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col" class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($usuarios as $user)
                <tr>
                    <th>{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="text-center">
                        <div class="d-flex flex-column flex-md-row gap-2 justify-content-center">
                            <a href="{{ route('users.show', ['user' => $user->id]) }}" class="btn btn-primary btn-sm">Visualizar</a>
                            <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este usuário?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Nenhum usuário encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
                
    </div>
@endsection

