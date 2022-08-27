<?php

namespace PrefCamapua\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicacaoRequest extends FormRequest
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
            'nome' => 'required',
            'numero' => 'required|numeric',
            'ano' => 'required|numeric',
            'descricao' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Por favor, preencha o campo NOME.',
            'numero.required' => 'Por favor, informe o NÚMERO DA PUBLICAÇÃO.',
            'numero.numeric' => 'NÚMERO DA PUBLICAÇÃO deve ser um numeral',
            'ano.required' => 'Por favor, informe  o ANO da PUBLICAÇÃO.',
            'ano.numeric' => 'ANO DA PUBLICAÇÃO deve ser um numeral',
            'descricao.required' => 'Por favor, preencha o campo DESCRIÇÃO.'
        ];
    }
}
