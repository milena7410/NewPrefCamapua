@extends('templates.admin')

@section('additional_stylesheet')
    {!! Html::style('painel/css/summernote.min.css') !!}
@stop


@section('content')
    <div class="main-container">
        <div class="page-header font-header"> Edição de Cargo</div>
        <ol class="breadcrumb">
            <li><a href="#">Administrativo</a></li>
            <li><a href={{route('admin.secretario.index')}}>Secretários</a></li>
            <li><a href="{{route('admin.cargo.create')}}">Cargos</a></li>
            <li class="active">Edição de Cargo</li>
        </ol>

        <div class="content-wrap">
            @include('admin.errors._check_form')
            @include('flash::message')

            <div class="panel panel-default">
                <div class="panel-heading font-header">Formulário de Edição de Cargo</div>
                <div class="panel-body">
                    {!! Form::model($cargo,['route' => ['admin.cargo.update',$cargo->id], 'method' => 'put',
                    'files' => true,'class' => 'form-horizontal font-12', ]) !!}

                    @include('admin.cargo._form_cargos')

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-sm-offset-4 col-sm-7">
                                <div class="btn-toolbar">
                                    {!! Form::submit('Salvar Alterações',['class' => 'btn btn-flat btn-success']) !!}
                                    <a href="{{route('admin.cargo.create')}}" class="btn btn-flat btn-danger">Cancelar</a>
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
    {!! Html::script('painel/js/libs/summernote/summernote.min.js') !!}
    {!! Html::script('painel/js/libs/summernote/summernote-pt-BR.js') !!}
    <script>
        $(".summernote").summernote({
            lang: "pt-BR"
        });
    </script>
@stop