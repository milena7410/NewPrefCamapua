@extends('templates.admin')

@section('content')
    <div class="main-container">
        <div class="page-header font-header"> Editar Usuário</div>
        <ol class="breadcrumb">
            <li><a href="#">Administrativo</a></li>
            <li><a href="#">Usuários</a></li>
            <li><a href="#">Novo Usuário</a></li>
            <li class="active">Editar Usuário</li>
        </ol>

        <div class="content-wrap">
            <div class="panel panel-default">
                <div class="panel-heading font-header">Formulário de Edição de Usuário</div>
                <div class="panel-body">
                    @include('admin.errors._check_form')
                    @include('flash::message')
                    {!! Form::model($user,['route' => ['admin.user.update',$user->id], 'method' => 'post','class' => 'form-horizontal font-12']) !!}
                    @include('admin.user._form_user')

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-sm-offset-4 col-sm-7">
                                <div class="btn-toolbar">
                                    {!! Form::submit('Salvar Alterações',['class' => 'btn btn-success']) !!}
                                    <a href="{{route('admin.user.list')}}" class="btn btn-danger">Cancelar</a>
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
    {!! Html::script('js/admin/user.js') !!}
@stop