@extends('templates.ead')

@section('content')
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="/icat">Inicio</a></li>
                <li class="active">Esqueci Minha Senha</li>
            </ol>
            @include('admin.errors._check_form')
            @include('flash::message')

            <div class="title-novos-cursos">
                <h4>Esqueci Minha Senha</h4>
            </div>

            <div class="col-md-8 col-md-offset-2 margin-top-50 margin-bottom-50">
                <small>Os campos com asterisco vermelho são de preenchimento obrigatório.</small>
                {!! Form::open(['route' => 'password.update', 'method' => 'post','class' => 'formulario']) !!}
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group">
                    <label>E-mail
                        <small>*</small>
                    </label>
                    {!! Form::email('email',null,['class' => 'form-control','required']) !!}
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Senha
                            <small>*</small>
                        </label>
                        {!! Form::password('password',['class' => 'form-control','required']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        <label>Confirmar Senha
                            <small>*</small></label>
                        {!! Form::password('password_confirmation',['class' => 'form-control','required']) !!}
                    </div>
                </div>


                <button type="submit" class="btn btn btn-block commonBtn">Recuperar Senha</button>
                <a href="{{route('get.login')}}" class="btn btn-danger btn-lg btn-block font-14 m-t-30">Cancelar</a>
                {{Form::close()}}
            </div>
        </div>
    </div>
@stop
