@extends('templates.admin')

@section('additional_stylesheet')
    {!! Html::style('painel/css/summernote.min.css') !!}
    {!! Html::style('painel/plugins/multi-select/css/multi-select.css',['media' => 'screen']) !!}
    <style>
        .ms-container {
            width: 97%;
        }
    </style>
@stop

@section('content')
    <div class="main-container">
        <div class="page-header font-header"> Editar de Secretário</div>
        <ol class="breadcrumb">
            <li><a href="#">Administrativo</a></li>
            <li><a href="#">Secretário</a></li>
            <li><a href="{{route('admin.secretario.index')}}">Listar Secretário</a></li>
            <li class="active">Editar</li>
        </ol>

        <div class="content-wrap">
            <div class="panel panel-default">
                <div class="panel-heading font-header">Formulário de Edição de Curso</div>
                <div class="panel-body">
                    @include('admin.errors._check_form')

                    @include('flash::message')

                    {!! Form::model($secretario,['route' => ['admin.secretario.update',$secretario->id],
                    'class' => 'form-horizontal font-12']) !!}
                    {{method_field('PUT')}}

                    @include('admin.secretario._form_secretario')

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-sm-offset-4 col-sm-7">
                                <div class="btn-toolbar">
                                    {!! Form::submit('Salvar Alterações',['class' => 'btn btn-success btn-flat']) !!}
                                    <a href="{{route('admin.secretario.index')}}" class="btn btn-danger btn-flat">
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
    {!! Html::script('painel/js/libs/summernote/summernote.min.js') !!}
    {!! Html::script('painel/js/libs/summernote/summernote-pt-BR.js') !!}
    {!! Html::script('painel/js/libs/validator.js') !!}
    {!! Html::script('painel/js/libs/jquery.mask.js') !!}
    {!! Html::script('painel/js/mascaras.js') !!}
    {!! Html::script('painel/plugins/multi-select/js/jquery.multi-select.js') !!}
    <script>
        $(document).ready(function () {
            $(".summernote").summernote({
                lang: "pt-BR"
            });
        });
    </script>
    {!! Html::script('painel/js/noticia.js') !!}


@stop