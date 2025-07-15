<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD</title>
</head>
<body>
        <a href="{{ route('users.index') }}">Login Usuário</a><br>

        <h2> Cadastrar Usuário </h2>

        @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p style="color: #f00;">
                         {{ $error }}
                    </p>
                @endforeach
           
         @endif
            
       

    <form action="{{ route('users.store') }}" method="post">
        @csrf
     
        <label for="name">Nome:</label>
        <input type="text" name="name" placeholder="Nome Completo" required value="{{old ('name')}}"> <br> <br>

        <label for="email">E-mail:</label>
        <input type="email" name="email" placeholder="E-mail Do Usuário" required value="{{old ('email')}}"> <br><br>

        <label for="password">Senha:</label>
        <input type="password" name="password" placeholder="Senha com minimo de 6 caracteres" required value="{{old ('password')}}"><br> <br>

        <button type="submit">Cadastrar</button>

</body>
</html> 