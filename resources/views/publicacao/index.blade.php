@extends('template.template')
@section('content')
    <div class="container">
        <div class="row">
            <h3>Publicações</h3>
            <div class="col-md-12">
                <div class="container-filtro margin-bottom-20 margin-top-20">
                    <h4>Buscar Publicações</h4>
                    {!! Form::open(['route' => 'publicacao.pesquisar']) !!}
                    {{method_field('GET')}}
                    <div class="row">
                        <div class="col-md-2 form-group">
                            <input type="text" class="form-control" name="numero" placeholder="Número">
                        </div>
                        <div class="col-md-2 form-group">
                            <input type="text" class="form-control" name="ano" placeholder="Ano">
                        </div>
                        <div class="col-md-4 form-group">
                            <input type="text" class="form-control" name="descricao"
                                   placeholder="Nome ou descrição">
                        </div>
                        <div class="col-md-3 form-group">
                            {!!
                                Form::select('tipo',
                                [null => 'TIPO DE PUBLICAÇÃO']+$tipos->toArray(),null,
                                ['class' => 'form-control'])
                            !!}
                        </div>

                        <div class="col-md-1">
                            <button class="btn pull-right btn-success">Buscar</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h3>
                    @if(empty($tipoPrincipal))
                        Resultado da Busca
                        @else
                        {{$tipoPrincipal->tipo}}
                    @endif
                </h3>
                <ul class="nav nav-stacked list-unstyled" id="accordion1">
                    @forelse($publicacoes as $publicacao)
                        <li class="panel panel-primary">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#{{$publicacao->id}}">
                                {{$publicacao->numero}}/{{$publicacao->ano}} - {{$publicacao->nome}}
                            </a>
                            <ul id="{{$publicacao->id}}" class="collapse margin-top-10 margin-bottom-10">
                                @forelse($publicacao->getArquivosAtivos as $arquivo)
                                    <li>
                                        <a href="{{asset($arquivo->getArquivo())}}" target="_blank">
                                            {{$arquivo->descricao}}
                                        </a>
                                    </li>
                                @empty
                                    <li class="text-center">Nenhum arquivo encontrado.</li>
                                @endforelse
                            </ul>
                        </li>
                    @empty
                        <li class="text-center">Nenhuma Publicação encontrada.</li>
                    @endforelse
                </ul>
                @if($subtipos->count() > 0)
                    <h3>Sub-Publicações</h3>
                    <ul class="list-unstyled list-inline">
                        @foreach($subtipos as $tipo)
                            <li class="btn btn-default btn-lg margin-right-10 margin-top-10">
                                <a href="{{route('publicacao.tipo',$tipo->url)}}">
                                    {{$tipo->tipo}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif

            </div>
        </div>
    </div>
@endsection