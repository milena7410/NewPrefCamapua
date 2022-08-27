<?php

namespace PrefCamapua\Http\Requests;

class UserRequest extends Request
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
        if($this->method() == 'POST') {
            return [
                'name' => 'required|min:2|max:100',
                'email' => 'required|email|max:150|unique:users',
                'password' => 'required|confirmed|min:6',
                'ativo' => 'required',
            ];
        }else{
            return [
                'name' => 'required|min:2|max:100',
                'email' => 'required|email|max:150|unique:users,id,'.$this->get('id')
            ];
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'Por favor, preencha o campo NOME.',
            'name.min' => 'Por favor, informe um NOME de no mínimo :min caracteres.',
            'name.max' => 'Por favor, informe um NOME de no máximo :max caracteres.',
            'email.required' => 'Por favor, preencha o campo E-MAIL.',
            'email.email' => 'Por favor, o formato de e-mail está inválido.',
            'email.unique' => 'O E-MAIL informado já está cadastrado no sistema.',
            'email.max' => 'Por favor, informe um E-MAIL de no máximo :max caracteres.',
            'ativo.required' => 'Por favor, preencha o campo ATIVAR USUÁRIO.',
            'password.required' => 'Por favor, preencha o campo SENHA.',
            'password.min' => 'Por favor, informe uma SENHA de no mínimo :min caracteres.',
            'password.confirmed' => 'A confirmação da senha não corresponde.',


        ];
    }
}
