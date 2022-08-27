@extends('template.template')
@push('styles')
    {!! Html::style('libs/blueimp/css/blueimp-gallery.min.css') !!}
@endpush
@section('content')
    <div class="container margin-top-40 margin-bottom-40">
        <div class="row">
            <div class="col-md-12">
                <h2>{{$noticia->titulo}}</h2>

                <div class="col-md-12 header-noticias margin-top-20">
                    {!! Html::image($noticia->getImagem(), $noticia->imagem, ['class' => 'img-responsive center-block']) !!}
                    <p class="col-md-6 margin-top-10">
                        Publicado: {{$noticia->data_publicacao}}
                        as {{$noticia->hora_publicacao}}
                    </p>


                    <div class="col-md-6 text-right">
                        <div class="addthis_inline_share_toolbox"></div>
                    </div>
                </div>


                <div class="col-md-12 conteudo-noticias text-justify margin-top-40 margin-bottom-40">
                    {!! $noticia->conteudo !!}
                </div>

                @if(!empty($noticia->galeria))
                    <div class="col-md-12">
                        <div class="container margin-top-20 margin-bottom-40" id="fotos">
                            <h3>Galeria - {{$noticia->galeria->titulo}}</h3>
                            <h4> {{$noticia->galeria->subtitulo}}</h4>
                            <div class="row margin-top-20">
                                @foreach($noticia->galeria->fotos()->get() as $foto)
                                    <div class="col-md-3">
                                        <a class="link-unstyled" href="{{$foto->getImagem()}}" title="{{$foto->foto}}">
                                            <img src="{{$foto->getImagem()}}" class="img-responsive" alt="{{$foto->foto}}">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
                            <div class="slides"></div>
                            <h3 class="title"></h3>
                            <a class="prev">‹</a>
                            <a class="next">›</a>
                            <a class="close">×</a>
                            <a class="play-pause"></a>
                            <ol class="indicator"></ol>
                        </div>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-12">
                        <a class="btn-voltar margin-top-20" href="{{route('noticia.lista')}}">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('javascript')
    {!! Html::script('libs/blueimp/js/blueimp-gallery.min.js') !!}
    <script>
        document.getElementById('fotos').onclick = function (event) {
            event = event || window.event;
            var target = event.target || event.srcElement,
                link = target.src ? target.parentNode : target,
                options = {index: link, event: event},
                links = this.getElementsByTagName('a');
            blueimp.Gallery(links, options);
        };
    </script>
@endpush