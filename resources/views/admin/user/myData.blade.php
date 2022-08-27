@extends('templates.admin')

@section('content')
    <div class="main-container">
        <div class="page-header font-header"> Meus Dados</div>
        <ol class="breadcrumb">
            <li class="active">Meus Dados</li>
        </ol>

        <div class="content-wrap">
            <div class="panel panel-default">
                <div class="panel-heading font-header">Alterar Dados do Usuário</div>
                <div class="panel-body">
                    @include('admin.errors._check_form')
                    @include('flash::message')

                    {!! Form::model($user,['route' => ['admin.user.update',$user->id], 'method' => 'post','files' => true,'class' => 'form-horizontal font-12', 'id' => 'produtoForm']) !!}
                    <div class="form-group has-feedback">
                        {!! Form::label('nome','Nome *',['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-7">
                            {!! Form::text('name',null,['class' => 'form-control input-transparent','required']) !!}
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="form-group has-feedback">
                        {!! Form::label('email','E-mail *',['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-7">
                            {!! Form::email('email',null,['class' => 'form-control input-transparent','required']) !!}
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

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