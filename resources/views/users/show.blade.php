<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Visualizar Usuários</title>
</head>
<body>

    <a href="{{ route('users.index') }}">Listar de usuários</a>
    <br>
    <a href="{{ route('users.edit', ['user' => $user->id]) }}">Editar Usuário</a>
    <br>
    <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Tem certeza que deseja deletar este usuário?')">Deletar</button>
    </form>

    <h2>Visualizar Usuário</h2>
        @if (session('success'))
        <p style="color: #0f0;">
            {{ session('success') }}
        </p>
    @endif

        Id: {{ $user->id }} <br>
        Nome: {{ $user->name }} <br>
        Email: {{ $user->email }} <br>
        DataCadastro: {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i:s') }} <br>
        DataAtualização: {{ \Carbon\Carbon::parse($user->updated_at)->format('d/m/Y H:i:s') }} <br>
        <hr>

</body>
</html>
