<?php

namespace PrefCamapua\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticiaCreateRequest extends FormRequest
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
            'titulo' => 'required|min:15|unique:noticias',
            'descricao' => 'required|max:255',
            'categoria_id' => 'required',
            'data_publicacao' => 'required',
            'hora_publicacao' => 'required',
            'foto' => 'required',
            'conteudo' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'Por favor, preencha o campo TÍTULO.',
            'titulo.min' => 'Por favor, informe um TÍTULO de no mínimo :min caracteres.',
            'titulo.unique' => 'TÍTULO informada já foi cadastrada',
            'descricao.required' => 'Por favor, informe um DESCRIÇÃO.',
            'descricao.max' => 'O campo DESCRIÇÃO deve possuir até :max caracteres.',
            'data_publicacao.required' => 'Por favor, informe a DATA DE PUBLICAÇÃO.',
            'hora_publicacao.required' => 'Por favor, informe a HORA DE PUBLICAÇÃO.',
            'foto.required' => 'Por favor, insira uma IMAGEM para está notícia.',
            'conteudo.required' => 'Por favor, informe o conteúdo dessa notícia.'
        ];
    }
}
