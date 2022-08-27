@extends('templates.admin')

@section('content')
    <div class="main-container">
        <div class="page-header font-header"> Banners</div>
        <ol class="breadcrumb">
            <li><a href="#">Administrativo</a></li>
            <li><a href="#">Site</a></li>
            <li class="active">Banners</li>
        </ol>

        <div class="content-wrap">
            <div class="panel panel-default">
                <div class="panel-heading font-header">Formulário de Cadastro de Banners</div>
                <div class="panel-body">
                    @include('admin.errors._check_form')
                    @include('flash::message')

                    {!! Form::open(['route' => 'admin.banner.store', 'method' => 'post', 'files' => true,
                            'class' => 'form-horizontal font-12']) !!}

                    @include('admin.banner._form_banner')

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-sm-offset-4 col-sm-7">
                                <div class="btn-toolbar">
                                    {!! Form::submit('Cadastrar',['class' => 'btn btn-success']) !!}
                                    {!! Form::reset('Cancelar',['class' => 'btn btn-danger']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <hr>
                @include('admin.banner._list_banners')
            </div>
        </div>
    </div>
@stop

@section('additional_scripts')
    {!! Html::script('js/admin/libs/validator.js') !!}
@stop