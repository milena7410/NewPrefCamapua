@extends('templates.admin')

@section('content')
    <div class="main-container">
        <div class="page-header font-header">Alterar Imagem do Secretário</div>
        <ol class="breadcrumb">
            <li><a href="#">Administrativo</a></li>
            <li><a href="#">Secretário</a></li>
            <li><a href="{{route('admin.secretario.index')}}">Listar Secretários</a></li>
            <li class="active">Alterar Imagem do Secretário</li>
        </ol>

        <div class="content-wrap">
            @include('admin.errors._check_form')
            @include('flash::message')
            <div class="panel panel-default">
                <div class="panel-heading font-header">Formulário de Alteração da Imagem do Secretário</div>
                <div class="panel-body">
                    {!! Form::open(['route' => ['admin.secretario.updatePhoto',$secretario->id], 'files' => true,
                            'class' => 'form-horizontal font-12']) !!}
                    {{method_field('PUT')}}

                    <div class="form-group has-feedback">
                        <label for="image" class="col-sm-2 control-label">
                            Imagem
                            <span class="help-block">Resolução: 123X161</span>
                        </label>
                        <div class="col-sm-7">
                            {!! Form::file('foto',['class' => 'form-control input-transparent','required']) !!}
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-sm-offset-4 col-sm-7">
                                <div class="btn-toolbar">
                                    {!! Form::submit('Salvar',['class' => 'btn btn-success']) !!}
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
    {!! Html::script('js/admin/libs/validator.js') !!}
@stop