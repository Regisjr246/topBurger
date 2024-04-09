<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'nome' => 'required|max:120|min:5',
            'telefone' => 'required|unique:cadastro_clientes,telefone|max:11|min:10',
            'email' => 'required|unique:cadastro_clientes,email|max:120',
            'cpf' => 'required|unique:cadastro_clientes,cpf|max:11|min:11',
            'endereco' => 'required|max:120',
             'password' => 'required|',
             'imagem'=>''
        ];
    }
    
    public function messages()
    {
        return [
          
        ];
    }
}
