<?php

namespace PrefCamapua\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SecretarioCreateRequest extends FormRequest
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
                'nome' => 'required|min:5',
                'email' => 'required|email',
                'cargo_id' => 'required',
                'foto' => 'required',
                'descricao' => 'required',
                'ativo' => 'required'
            ];

    }

    public function messages()
    {
        return [
            'nome.required' => 'Por favor, preencha o campo NOME.',
            'nome.min' => 'Por favor, informe um NOME de no mínimo :min caracteres.',
            'email.required' => 'Por favor, informe um E-MAIL',
            'email.email' => 'Por favor, informe um E-MAIL válido',
            'foto.required' => 'Por favor, insira uma IMAGEM',
            'descricao.required' => 'Por favor, preencha o campo DESCRIÇÃO.',
            'cargo_id.required' => 'Por favor, selecione um CARGO.',
            'ativo.required' => 'Por favor, informe se o produto estará ativo.'
        ];
    }
}
