<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar</title>
</head>

<body>

    <a href="{{ route('users.create') }}">Cadastrar Usuário</a><br>

    <h2>Lista de Usuários</h2>

    @if (session('success'))
        <p style="color: #0f0;">
            {{ session('success') }}
        </p>
    @endif

    @forelse ($usuarios as $user)
        Id: {{ $user->id }} <br>
        Nome: {{ $user->name }} <br>
        Email: {{ $user->email }} <br>

        <a href="{{ route('users.show', ['user' => $user->id]) }}">Visualizar</a> <br>
        <a href="{{ route('users.edit', ['user' => $user->id]) }}">Editar </a> <br>
       <!--<a href="{{ route('users.destroy', ['user' => $user->id]) }}">Deletar</a>-->
        <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Tem certeza que deseja deletar este usuário?')">Deletar</button>
        </form>
        <hr>

    @empty
        <p>Nenhum usuário encontrado.</p>
    @endforelse

</body>
</html>
