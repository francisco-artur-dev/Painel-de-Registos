<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;



class UserController extends Controller
{
    //carregar view index
    public function index()
    {
        return view('users.index');
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
        User::create($data); // Cria o usuário
         return redirect()->route('users.create')->with('success', 'Usuário criado com sucesso.');
    }
}
