<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;



class UserController extends Controller
{
    //carregar view index
    public function index()
    {    //
        $usuarios= User::orderBy('id')->get(); // Recupera todos os usuários do banco de dados, ordenados por ID em ordem crescente
        return view('users.index', ['usuarios' => $usuarios]); // Passa os usuários para a view index
    }

    public function show(User $user)
    {
        // Exibe os detalhes do usuário selecionado
        return view('users.show', ['user' => $user]);
    }

    // carregar a view usuário
    public function create()
    {
        return view('users.create');
    }

    public function store(UserRequest $request)
    {
        // carregar a validação do formulário
        $data = $request->validated(); // valida o request usando UserRequest

        User::create($data); // Cria ou cadastra o usuário na BD

        // Redireciona para a rota de index com uma mensagem de sucesso
         return redirect()->route('users.index')->with('success', 'Usuário cadastrado com sucesso.');
    }

    public function edit(User $user)
    {
        // Exibe o formulário de edição do usuário selecionado
        return view('users.edit', ['user' => $user]);
    }

    public function update(UserRequest $request, User $user)
    {
        // Atualiza os dados do usuário com base na validação do formulário
        $data = $request->validated();
        $user->update($data); // Atualiza o usuário no banco de dados

        // Redireciona para a rota de index com uma mensagem de sucesso
        return redirect()->route('users.show', ['user' => $user->id])->with('success', 'Usuário atualizado com sucesso.');
    }
    public function destroy(User $user)
    {
        // Exclui o usuário selecionado
        $user->delete();

        // Redireciona para a rota de index com uma mensagem de sucesso
        return redirect()->route('users.index')->with('success', 'Usuário excluído com sucesso.');
    }
}
