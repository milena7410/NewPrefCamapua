<?php

namespace PrefCamapua\Http\Requests;


class CategoriaRequest extends Request
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
                'categoria' => 'required|unique:categorias'
            ];
        }else{
            return [
                'categoria' => 'required|unique:categorias,id,'.$this->get('id')
            ];
        }

    }

    public function messages()
    {
        return [
            'categoria.required' => 'Por favor, preencha o campo CATEGORIA.',
            'categoria.unique' => 'Desculpe, essa CATEGORIA já foi cadastrada.',
        ];
    }
}
