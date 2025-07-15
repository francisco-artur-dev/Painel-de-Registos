<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login do usuário</title>
</head>
<body>

    <a href="{{ route('users.create') }}">Cadastrar Usuário</a><br>

    <h2> Login Do Usário

    <form action="{{ route('users.store') }}" method="post">
        @csrf
        @method('POST')

        <label for="email">E-mail:</label>
        <input type="email" name="email" placeholder="E-mail Do Usuário" required><br> <br>

        <label for="password">Senha:</label>
        <input type="password" name="password" placeholder="Senha com minimo de 6 caracteres" required> <br><br>

        <button type="submit">Login</button>
    

</body>
</html>