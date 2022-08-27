@extends('template.template')
@section('content')
    <div class="container">
        <div class="row">
            <h3>{{$secretaria->secretaria}}</h3>
            <div class="col-md-3">
                <div class="panel panel-primary ">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Secretário</h3>
                    </div>
                    <div class="panel-body">
                        <img src="{{$secretaria->secretario->getImagem()}}" alt="{{$secretaria->secretario->imagem}}"
                             class="img-responsive center-block">
                        <ul class="list-unstyled margin-top-10">
                            <li>
                                <strong>Nome:</strong>
                                {{$secretaria->secretario->nome}}
                            </li>
                            <li>
                                <strong>Cargo:</strong>
                                {{$secretaria->secretario->cargo->cargo}}
                            </li>
                            <li>
                                <strong>Email:</strong>
                                {{$secretaria->secretario->email}}
                            </li>
                        </ul>

                        <button type="button" class="btn btn-primary btn-sm center-block" data-toggle="modal" data-target="#curriculo">
                            Currículo
                        </button>
                    </div>
                </div>

                <div class="panel panel-primary ">
                    <div class="panel-heading">
                        <h3 class="panel-title">Páginas</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="list-unstyled margin-top-10 text-center">
                            @forelse($paginas as $pagina)
                                @if($pagina->isInterno())
                                    <li>
                                        <a href="{{route('pagina.show',['url' => $pagina->url])}}"
                                           target="{{$pagina->getTargetName()}}">
                                            {{$pagina->titulo}}
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ $pagina->url }}"
                                           target="{{$pagina->getTargetName()}}">
                                            {{$pagina->titulo}}
                                        </a>
                                    </li>
                                @endif
                            @empty
                                <li>Nenhuma Página Encontrada</li>
                            @endforelse
                        </ul>
                    </div>
                </div>

                <div class="panel panel-primary ">
                    <div class="panel-heading">
                        <h3 class="panel-title">Links</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="list-unstyled margin-top-10 text-center">
                            @forelse($links as $link)
                                <li>
                                    <a href="{{$link->url}}" target="{{$link->getTargetName()}}">
                                        {{$link->titulo}}
                                    </a>
                                </li>
                            @empty
                                <li>Nenhum Link Encontrado</li>
                            @endforelse
                        </ul>
                    </div>
                </div>

                <div class="panel panel-primary ">
                    <div class="panel-heading">
                        <h3 class="panel-title">Galeria</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="list-unstyled margin-top-10 text-center">
                            @forelse($galerias as $galeria)
                                <li>
                                    <a href="{{route('galeria.show',$galeria->id)}}">
                                        {{$galeria->titulo}}
                                    </a>
                                </li>
                            @empty
                                <li>Nenhuma Galeria Encontrada</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="container-fluid">
                    @foreach($noticias as $noticia)
                        <div class="row margin-top-20 container-single-news">
                            <div class="col-md-5">
                                {!! Html::image($noticia->getImagem(), $noticia->imagem, ['class' => 'img-responsive']) !!}
                            </div>
                            <div class="col-md-7">
                                <div class="container-description-news">
                                    <div class="title-new">
                                        <h3 class="reset-margin">{{$noticia->titulo}} <br>
                                            <small>
                                                Publicado: {{$noticia->data_publicacao}}
                                                as {{$noticia->hora_publicacao}}</small>
                                        </h3>
                                    </div>
                                    <div class="descricao margin-top-20">
                                        <p>{{$noticia->descricao}}</p>
                                    </div>
                                    <a class="pull-right" href="{{route('noticia',['url' => $noticia->url])}}">Leia
                                        Mais</a>
                                </div>
                            </div>
                            <hr>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @include('secretarias._curriculo')
@endsection