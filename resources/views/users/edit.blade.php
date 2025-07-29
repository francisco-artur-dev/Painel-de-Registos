<!DOCTYPE html>
<html lang="PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Usuário</title>
</head>
<body>
    <a href="{{ route('users.index') }}">Listar de usuários</a> <br>
    <a href="{{ route('users.show', ['user' => $user->id]) }}">Visualizar Usuário</a>

    <h2>Editar Usuário</h2>

  @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p style="color: #f00;">
                         {{ $error }}
                    </p>
                @endforeach

        @endif


    <form action="{{ route('users.update', ['user' => $user->id]) }}" method="post">
        @csrf
        @method('PUT')

        <label for="name">Nome:</label>
        <input type="text" name="name" placeholder="Nome Completo"  value="{{old ('name', $user->name)}}"> <br> <br>

        <label for="email">Email:</label>
        <input type="email" name="email" placeholder="E-mail Do Usuário"  value="{{old ('email', $user->email)}}"> <br><br>

        <label for="password">Senha:</label>
        <input type="password" name="password" placeholder="Senha com minimo de 6 caracteres"  value="{{old ('password')}}"><br> <br>

        <button type="submit">Editar</button>

</body>
</html>
