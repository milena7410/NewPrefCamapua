@extends('template.template')
@section('content')
    <div class="container margin-top-20 margin-bottom-40">
        <h3>Resultados de pesquisa: <small>"{{$pesquisa}}"</small></h3>
        {{--lista resultados--}}
        @forelse($noticias as $noticia)
            <div class="row margin-top-20 container-single-news">
                <div class="col-md-6">
                    {!! Html::image($noticia->getImagem(), $noticia->imagem, ['class' => 'img-responsive']) !!}
                </div>
                <div class="col-md-6">
                    <div class="container-description-news">
                        <div class="title-new">
                            <h3 class="reset-margin">{{ $noticia->titulo }} <br>
                                <small>
                                    Publicado:  {{$noticia->data_publicacao}}
                                    as {{$noticia->hora_publicacao}}
                                </small>
                            </h3>
                        </div>
                        <div class="descricao margin-top-20">
                            <p>{{$noticia->descricao}}</p>
                        </div>
                        <a class="pull-right" href="{{route('noticia',['url' => $noticia->url])}}">Leia Mais</a>
                    </div>
                </div>
                <hr>
            </div>
            @empty
            <div class="row margin-top-20 container-single-news">
                <div class="col-md-12 text-center">
                    <strong>Nenhum registro encontrado</strong>
                </div>
            </div>
        @endforelse
    </div>
@endsection