@extends('templates.login_admin')
@section('content')
    <div class="wrapper animsition">
        <div class="container text-center">
            <div class="single-wrap">
                <div class="single-inner-padding text-center">
                    @include('errors._check_form')
                    @include('flash::message')
                    <h3 class="font-header no-m-t">Acesso Restrito</h3>
                    <div class="dots-divider m-t-20 center-block"><span class="icon-flickr4"></span></div>
                    <form method="post" action="/logar">
                        {!! csrf_field() !!}

                        <div class="form-group form-input-group m-t-30 m-b-5">
                            <input type="email" class="form-control input-lg font-14" name="email"
                                   value="{{ old('email') }}" placeholder="E-mail">
                            <input type="password" name="password" class="form-control input-lg font-14" placeholder="Senha">
                        </div>

                        <div class="m-l-10 font-11 text-left">
                            <a href="#recuperarSenha" data-toggle="modal" data-target=".model-recuperar-senha">
                                Esqueceu sua senha?
                            </a>
                        </div>

                        <button class="btn btn-success btn-lg btn-block font-14 m-t-30" type="submit">Acessar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection