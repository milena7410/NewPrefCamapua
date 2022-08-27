<?php

namespace PrefCamapua\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticiaUpdateRequest extends FormRequest
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
            'titulo' => 'required|min:15|unique:noticias,id,' . $this->get('id'),
            'descricao' => 'required|max:255',
            'categoria_id' => 'required',
            'data_publicacao' => 'required',
            'hora_publicacao' => 'required',
            'conteudo' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'Por favor, preencha o campo TÍTULO.',
            'titulo.min' => 'Por favor, informe um TÍTULO de no mínimo :min caracteres.',
            'titulo.unique' => 'TÍTULO informadO já foi cadastradO',
            'categoria_id.required' => 'Por favor, informe uma CATEGORIA',
            'data_publicacao.required' => 'Por favor, informe a DATA DE PUBLICAÇÃO',
            'hora_publicacao.required' => 'Por favor, informe a HORA DE PUBLICAÇÃO',
            'descricao.required' => 'Por favor, informe a BREVE DESCRIÇÃO notícia.',
            'descricao.max' => 'Por favor, reduza a descrição da notícia.'
        ];
    }
}
