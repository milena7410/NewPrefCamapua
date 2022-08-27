@extends('templates.admin')

@section('content')
    <div class="main-container">
        <div class="page-header font-header"> Cadastro de Usuário</div>
        <ol class="breadcrumb">
            <li><a href="#">Administrativo</a></li>
            <li><a href="#">Usuários</a></li>
            <li class="active">Novo Usuário</li>
        </ol>

        <div class="content-wrap">
            <div class="panel panel-default">
                <div class="panel-heading font-header">Formulário de Cadastro de Usuário</div>
                <div class="panel-body">
                    @include('admin.errors._check_form')
                    @include('flash::message')

                    {!! Form::open(['route' => 'admin.user.store', 'method' => 'post','class' => 'form-horizontal font-12', 'id' => 'userForm']) !!}
                    @include('admin.user._form_user')

                    <div class="form-group has-feedback">
                        {!! Form::label('password','Senha *',['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-7">
                            {!! Form::password('password',['class' => 'form-control input-transparent','required','id' => 'inputPassword']) !!}
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        {!! Form::label('password_confirmation','Confirmar Senha *',['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-7">
                            {!! Form::password('password_confirmation',['class' => 'form-control input-transparent','required',
                    'data-match' => "#inputPassword", 'data-match-error'=> "Oops, as senhas não se correspondem"]) !!}
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

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
            </div>

        </div>
    </div>
@stop

@section('additional_scripts')
    {!! Html::script('js/admin/libs/validator.js') !!}
    {!! Html::script('js/admin/user.js') !!}
@stop