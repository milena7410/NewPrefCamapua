@extends('templates.admin')

@section('content')
    <div class="main-container">
        <div class="page-header font-header">Cadastro de Subtipo - {{$tipo->tipo}}</div>
        <ol class="breadcrumb">
            <li><a href="#">Administrativo</a></li>
            <li><a href="#">Publicação</a></li>
            <li class="active">Nova SubTipo</li>
        </ol>

        <div class="content-wrap">
            <div class="panel panel-default">
                <div class="panel-heading font-header">Formulário de Cadastro de SubTipo de <strong>{{$tipo->tipo}}</strong></div>
                <div class="panel-body">
                    @include('admin.errors._check_form')
                    @include('flash::message')

                    {!! Form::open(['route' => 'admin.tipo.store', 'method' => 'post',
                    'class' => 'form-horizontal font-12']) !!}

                    <input type="hidden" value="{{$tipo->id}}" name="tipo_publicacao_id">

                    @include('admin.tipoPublicacao._form_subtipo')

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
                <hr>
                @include('admin.tipoPublicacao._list_subtipo_publicacao')
            </div>
        </div>
    </div>
@stop