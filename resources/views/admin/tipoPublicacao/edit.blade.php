@extends('templates.admin')

@section('additional_stylesheet')
    {!! Html::style('painel/css/summernote.min.css') !!}
@stop


@section('content')
    <div class="main-container">
        <div class="page-header font-header"> Edição de Tipo de Publicação</div>
        <ol class="breadcrumb">
            <li><a href="#">Administrativo</a></li>
            <li><a href="#">Publicações</a></li>
            <li><a href="{{route('admin.tipo.create')}}">Tipos de Publicação</a></li>
            <li class="active">Edição de Tipo de Publicação</li>
        </ol>

        <div class="content-wrap">
            @include('admin.errors._check_form')
            @include('flash::message')

            <div class="panel panel-default">
                <div class="panel-heading font-header">Formulário de Edição de Tipo de Publicação</div>
                <div class="panel-body">
                    {!! Form::model($tipo,['route' => ['admin.tipo.update',$tipo->id], 'method' => 'put',
                    'files' => true,'class' => 'form-horizontal font-12', 'id' => 'categoryForm']) !!}

                    @include('admin.tipoPublicacao._form_tipo_publicacao')

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-sm-offset-4 col-sm-7">
                                <div class="btn-toolbar">
                                    {!! Form::submit('Salvar Alterações',['class' => 'btn btn-flat btn-success']) !!}
                                    <a href="{{route('admin.categoria.create')}}" class="btn btn-flat btn-danger">Cancelar</a>
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
    {!! Html::script('js/admin/category.js') !!}
@stop