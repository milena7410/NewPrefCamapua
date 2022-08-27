@extends('templates.admin')

@section('content')
    <div class="main-container">
        <div class="page-header font-header">Cadastro de Secretaria</div>
        <ol class="breadcrumb">
            <li><a href="#">Administrativo</a></li>
            <li><a href="#">Secretaria</a></li>
            <li class="active">Novo Secretaria</li>
        </ol>

        <div class="content-wrap">
            <div class="panel panel-default">
                <div class="panel-heading font-header">Formulário de Cadastro de Secretaria</div>
                <div class="panel-body">
                    @include('admin.errors._check_form')
                    @include('flash::message')

                    {!! Form::open(['route' => 'admin.secretaria.store', 'method' => 'post',
                    'class' => 'form-horizontal font-12']) !!}

                    @include('admin.secretaria._form_secretaria')

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
    {!! Html::script('painel/js/libs/validator.js') !!}
    {!! Html::script('painel/js/libs/jquery.mask.js') !!}
    {!! Html::script('painel/js/mascaras.js') !!}
    {!! Html::script('painel/plugins/multi-select/js/jquery.multi-select.js') !!}
@stop