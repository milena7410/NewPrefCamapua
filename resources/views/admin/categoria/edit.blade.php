@extends('templates.admin')

@section('additional_stylesheet')
    {!! Html::style('painel/css/summernote.min.css') !!}
@stop


@section('content')
    <div class="main-container">
        <div class="page-header font-header"> Edição de Categoria</div>
        <ol class="breadcrumb">
            <li><a href="#">Administrativo</a></li>
            <li><a href="#">Notícias</a></li>
            <li><a href="{{route('admin.categoria.create')}}">Categoria</a></li>
            <li class="active">Edição de Categoria</li>
        </ol>

        <div class="content-wrap">
            @include('admin.errors._check_form')
            @include('flash::message')

            <div class="panel panel-default">
                <div class="panel-heading font-header">Formulário de Edição de Categoria</div>
                <div class="panel-body">
                    {!! Form::model($categoria,['route' => ['admin.categoria.update',$categoria->id], 'method' => 'put',
                    'files' => true,'class' => 'form-horizontal font-12', 'id' => 'categoryForm']) !!}

                    @include('admin.categoria._form_categoria')

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
    {!! Html::script('painel/js/libs/summernote/summernote.min.js') !!}
    {!! Html::script('painel/js/libs/summernote/summernote-pt-BR.js') !!}
    <script>
        $(".summernote").summernote({
            lang: "pt-BR"
        });
    </script>
@stop