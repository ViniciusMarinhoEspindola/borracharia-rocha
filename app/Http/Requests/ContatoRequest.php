<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContatoRequest extends FormRequest
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
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'max:255'],
            'msg' => ['required', 'max:600']
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
            'name.required' => 'Por favor, digite um nome válido',
            'email.required' => 'O campo e-mail é obrigatório',
            'email.email' => 'Por favor, digite um endereço de e-mail válido',
            'phone.required' => 'Por favor, digite um número de telefone válido',
            'msg.required' => 'O campo mensagem é obrigatório',
            'max' => 'Número de caracteres ultrapassou o limite permitido',
        ];
    }
}
