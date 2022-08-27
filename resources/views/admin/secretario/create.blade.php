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
        <div class="page-header font-header">Cadastro de Secretário</div>
        <ol class="breadcrumb">
            <li><a href="#">Administrativo</a></li>
            <li><a href="#">Secretários</a></li>
            <li class="active">Novo Secretário</li>
        </ol>

        <div class="content-wrap">
            <div class="panel panel-default">
                <div class="panel-heading font-header">Formulário de Cadastro de Secretário</div>
                <div class="panel-body">
                    @include('admin.errors._check_form')
                    @include('flash::message')

                    {!! Form::open(['route' => 'admin.secretario.store', 'method' => 'post','files' => true,
                    'class' => 'form-horizontal font-12']) !!}

                    <div class="form-group has-feedback">
                        <label for="image" class="col-sm-2 control-label">
                            Foto
                            <span class="help-block">Resolução: 123X161</span>
                        </label>
                        <div class="col-sm-7">
                            {!! Form::file('foto',['class' => 'form-control input-transparent','required']) !!}
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                    </div>

                    @include('admin.secretario._form_secretario')

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-sm-offset-4 col-sm-7">
                                <div class="btn-toolbar">
                                    {!! Form::submit('Cadastrar',['class' => 'btn btn-success btn-flat']) !!}
                                    {!! Form::reset('Cancelar',['class' => 'btn btn-danger btn-flat']) !!}
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
    {!! Html::script('painel/js/noticia.js') !!}
    <script>
        $(document).ready(function () {
            $(".summernote").summernote({
                lang: "pt-BR"
            });
        });
    </script>
@stop