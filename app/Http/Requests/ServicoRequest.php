<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ServicoRequest extends FormRequest
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
            'title' => ['required', 'max:255'],
            'type' => ['required', 'max:255'],
            'estimated_time' => ['required', 'max:255']
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
            'title.required' => 'O campo título é obrigatório',
            'type.required' => 'O campo tipo é obrigatório',
            'estimated_time.required' => 'O campo tempo estimado é obrigatório',
            'max' => 'Número de caracteres ultrapassou o limite permitido',
        ];
    }
}
