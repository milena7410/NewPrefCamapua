@extends('templates.login_admin')
@section('content')
    <div class="wrapper animsition">
        <div class="container text-center">
            <div class="single-wrap">
                <div class="single-inner-padding text-center">
                    @include('errors._check_form')
                    @include('flash::message')
                    <h3 class="font-header no-m-t">Resetar Senha</h3>
                    <div class="dots-divider m-t-20 center-block"><span class="icon-flickr4"></span></div>
                    <form method="POST" action="/recuperar-senha.html">
                        {!! csrf_field() !!}
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group m-t-15">
                            <input type="email" name="email" class="form-control input-lg font-14" value="{{ old('email') }}" required placeholder="Email">
                        </div>

                        <div class="form-group form-input-group m-t-30 m-b-5">
                            <input type="password" required name="password" placeholder="Senha" class="form-control input-lg font-14">

                            <input type="password" required name="password_confirmation" placeholder="Confirmar Senha" class="form-control input-lg font-14">
                        </div>

                        <button class="btn btn-primary btn-lg btn-block font-14 m-t-30" type="submit">Recuperar Senha</button>

                        <a href="{{route('get.login')}}" class="btn btn-danger btn-lg btn-block font-14 m-t-30">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection