<?php

namespace PrefCamapua\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SecretariaUpdateRequest extends FormRequest
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
            'secretaria' => 'required|min:5|unique:secretarias,id,' . $this->get('id'),
            'email' => 'required|email',
            'secretario_id' => 'required',
            'ativo' => 'required'
        ];

    }

    public function messages()
    {
        return [
            'secretaria.required' => 'Por favor, preencha o campo SECRETARIA.',
            'secretaria.min' => 'Por favor, informe um SECRETARIA de no mínimo :min caracteres.',
            'secretaria.unique' => 'SECRETARIA informada já foi cadastrada',
            'email.required' => 'Por favor, informe um E-MAIL',
            'email.email' => 'Por favor, informe um E-MAIL válido',
            'secretario_id.required' => 'Por favor, selecione um SECRETÁRIO.',
            'ativo.required' => 'Por favor, informe se o produto estará ativo.'
        ];
    }
}
