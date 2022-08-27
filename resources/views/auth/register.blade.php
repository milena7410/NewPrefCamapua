@extends('templates.login_admin')
@section('content')
    <div class="wrapper animsition">
        <div class="container text-center">
            <div class="single-wrap">
                <div class="single-inner-padding text-center">
                    @include('errors._check_form')
                    @include('flash::message')
                    <h3 class="font-header no-m-t">Formulário de Cadastro</h3>
                    <div class="dots-divider m-t-20 center-block"><span class="icon-flickr4"></span></div>
                    <form method="POST" action="{{route('client.store')}}">
                        {!! csrf_field() !!}

                        <div class="form-group m-t-15">
                            {!! Form::text('user[name]',null,['class' => 'form-control input-lg font-14','required','placeholder' => 'Nome']) !!}
                        </div>

                        <div class="form-group m-t-5">
                            {!! Form::text('user[email]',null,['class' => 'form-control input-lg font-14','required','placeholder' => 'E-mail']) !!}
                        </div>

                        <div class="form-group m-t-5">
                            {!! Form::text('phone',null,['class' => 'form-control input-lg font-14','required','placeholder' => 'Telefone']) !!}
                        </div>

                        <div class="form-group form-input-group m-t-30 m-b-5">
                            {!! Form::password('password',['class' => 'form-control input-lg font-14','required','placeholder' => 'Senha']) !!}

                            {!! Form::password('password_confirmation',['class' => 'form-control input-lg font-14','required','placeholder' => 'Confirmar Senha']) !!}
                        </div>

                        <button class="btn btn-primary btn-lg btn-block font-14 m-t-30" type="submit">Criar Nova Conta</button>

                        <a href="{{route('get.login')}}" class="btn btn-default btn-lg btn-block font-14 m-t-30">Voltar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection