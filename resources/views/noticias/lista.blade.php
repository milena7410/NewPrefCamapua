@extends('template.template')
@section('content')
    <div class="container margin-top-40 margin-bottom-40">
        @foreach($noticias as $noticia)
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
        @endforeach
            <div class="text-center">
                {{ $noticias->links() }}
            </div>

    </div>
@endsection