@extends('template.template')
@section('content')
    <div class="container margin-top-20 margin-bottom-40">
        <div class="row">
            @include('admin.errors._check_form')
            @include('flash::message')
            <div class="container-title-noticias margin-bottom-40">
                <h4 class="text-uppercase">Contato</h4>
            </div>
            <div class="col-md-6">
                {!! Form::open(['route' => 'pagina.contatar']) !!}
                {{ method_field('post') }}
                <div class="form-group">
                    <input type="text" name="nome" class="form-control"
                           placeholder="Nome Completo">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="E-mail" required>
                </div>
                <div class="form-group">
                    <input type="text" name="assunto" class="form-control" placeholder="Assunto" required>
                </div>
                <div class="form-group">
                    <input type="tel" name="telefone" class="form-control" placeholder="Telefone" required>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="mensagem" rows="6" placeholder="Mensagem" required></textarea>
                </div>
                <div class="row">
                    <div class="col-md-4 col-md-offset-8">
                        <button class="btn btn-block btn-success">Enviar</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="col-md-4 col-md-offset-2">
                <div class="container-title-noticias">
                    <h4 class="text-uppercase">Onde Estamos</h4>
                </div>
                <div class="margin-top-20">
                    <p>{{$entidade->rua}}, {{ $entidade->numero }}</p>
                    <p>{{ $entidade->bairro }} - CEP: {{ $entidade->cep }}</p>
                    <p>{{ $entidade->cidade }} - {{ $entidade->estado }}</p>
                </div>
                <div class="container-title-noticias margin-top-20">
                    <h4 class="text-uppercase">Contato</h4>
                </div>
                <div class="margin-top-20">
                    <p>{{ $entidade->email }}</p>
                    <br>
                    <p>{{ $entidade->telefone }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection