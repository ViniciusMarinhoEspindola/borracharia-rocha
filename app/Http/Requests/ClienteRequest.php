<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClienteRequest extends FormRequest
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
            'email' => ['required', 'email', 'max:255',  Rule::unique('clientes')->ignore($this->cliente)],
            'phone' => ['required', 'max:255'],
            'password' => ['required_without:_method', 'max:255'],
            'type' => ['max:255'],
            'brand' => ['max:255'],
            'model' => ['max:255']
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
            'name.required' => 'Por favor, digite um nome de cliente válido',
            'email.required' => 'O campo e-mail é obrigatório',
            'email.email' => 'Por favor, digite um endereço de e-mail válido',
            'email.unique' => 'Este endereço de e-mail já está cadastrado',
            'phone.required' => 'Por favor, digite um número de telefone válido',
            'password.required' => 'O campo senha é obrigatório',
            'max' => 'Número de caracteres ultrapassou o limite permitido',
        ];
    }
}
