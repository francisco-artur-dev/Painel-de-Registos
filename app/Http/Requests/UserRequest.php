<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {   // Obtém o ID do usuário da rota, se estiver presente
        $userID= $this->route('user');

        return [
            //Validação dos campos do formulário
            'name'=>'required',
            'email'=> 'required|email|unique:users,email,' . ( $userID ? $userID->id : null),// Verifica se o email é único, exceto para o usuário atual
            'password'=> 'required|min:6',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'O campo e-mail deve ser um endereço de e-mail válido.',
            'email.unique' => 'O e-mail informado já está em uso.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.min' => 'O campo senha deve ter pelo menos 6 caracteres.',
        ];
    }

}
