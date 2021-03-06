<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255',  Rule::unique('users')->ignore($this->user)],
            'password' => ['required_without:_method', 'max:255']
        ];
    }

     /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Por favor, digite um nome de usuário válido',
            'email.required' => 'O campo e-mail é obrigatório',
            'email.email' => 'Por favor, digite um endereço de e-mail válido',
            'email.unique' => 'Este endereço de e-mail já está cadastrado',
            'password.required' => 'O campo senha é obrigatório',
            'max' => 'Número de caracteres ultrapassou o limite permitido',
        ];
    }
}
