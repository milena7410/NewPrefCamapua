@extends('templates.admin')

@section('additional_stylesheet')
    {!! Html::style('painel/js/libs/summernote_plugin/summernote.css') !!}
    {!! Html::style('painel/plugins/multi-select/css/multi-select.css',['media' => 'screen']) !!}
    {!! Html::style('painel/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') !!}
    <style>
        .ms-container {
            width: 97%;
        }

        .modal-body{
            padding: 25px !important;
        }
    </style>
@stop

@section('content')
    <div class="main-container">
        <div class="page-header font-header"> Editar de Notícia</div>
        <ol class="breadcrumb">
            <li><a href="#">Administrativo</a></li>
            <li><a href="#">Notícias</a></li>
            <li><a href="{{route('admin.noticia.index')}}">Listar Notícias</a></li>
            <li class="active">Editar</li>
        </ol>

        <div class="content-wrap">
            <div class="panel panel-default">
                <div class="panel-heading font-header">Formulário de Edição de Notícia</div>
                <div class="panel-body">
                    @include('admin.errors._check_form')
                    @include('flash::message')

                    {!! Form::model($noticia,['route' => ['admin.noticia.update',$noticia->id],
                    'class' => 'form-horizontal font-12']) !!}
                    {{method_field('PUT')}}

                    @include('admin.noticia._form_noticia')

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-sm-offset-4 col-sm-7">
                                <div class="btn-toolbar">
                                    {!! Form::submit('Salvar Alterações',['class' => 'btn btn-success btn-flat']) !!}
                                    <a href="{{route('admin.noticia.index')}}" class="btn btn-danger btn-flat">
                                        Cancelar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
@stop

@section('additional_scripts')
    {!! Html::script('painel/js/libs/summernote_plugin/summernote.min.js') !!}
    {!! Html::script('painel/js/libs/summernote/summernote-pt-BR.js') !!}
    {!! Html::script('painel/js/libs/summernote_plugin/summernote-image-attributes.js') !!}
    {!! Html::script('painel/js/libs/validator.js') !!}
    {!! Html::script('painel/js/libs/jquery.mask.js') !!}
    {!! Html::script('painel/js/mascaras.js') !!}
    {!! Html::script('painel/js/libs/jquery.quicksearch.js') !!}
    {!! Html::script('painel/plugins/multi-select/js/jquery.multi-select.js') !!}
    {!! Html::script('painel/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') !!}
    {!! Html::script('painel/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.pt-BR.min.js') !!}
    {!! Html::script('painel/js/noticia.js') !!}

@stop