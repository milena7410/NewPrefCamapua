@extends('template.template')
@push('styles')
    {!! Html::style('libs/blueimp/css/blueimp-gallery.min.css') !!}
@endpush
@section('content')
    <div class="container margin-top-20 margin-bottom-40" id="fotos">
        <h3>Galeria: {{$galeria->titulo}}</h3>
        <h4> {{$galeria->subtitulo}}</h4>
        <div class="row margin-top-20">
            @foreach($fotos as $foto)
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