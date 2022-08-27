@extends('template.template')

@section('content')

@if(count($banners) > 0)
<div class=" slider reset-padding">
    <div id="slider-noticias" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($banners as $key => $banner)
            <?php $active = ($key == 0) ? 'active' : ''; ?>
            <li data-target="#slider-noticias" data-slide-to="{{$key}}" class="{{$active}}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner" role="listbox">
            @foreach($banners as $key => $banner)
            <?php $active = ($key == 0) ? 'active' : ''; ?>
            <div class="item {{$active}}">
                @if(!empty($banner->link))
                <a href="{{$banner->link}}">{!! Html::image($banner->getPathImage(), $banner->imagem, ['class' => 'img-responsive']) !!}</a>
                    @endif

                    @if(!empty($banner->descricao))
                    <div class="carousel-caption">
                        <p>{{$banner->titulo}}</p>
                    </div>
                    @endif

                    @if(!empty($banner->url))
                    <a href="{{$banner->url}}">{!! Html::image($banner->getPathImage(), $banner->imagem, ['class' => 'img-responsive']) !!}</a>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif

    {{--Inicio buscar--}}
    <div class="container-fluid margin-top-20 margin-bottom-20">
        <div class="row">
            <div class="barra-busca">
                <div class="form-busca-container">
                    {!! Form::open(['route' => 'noticia.pesquisar']) !!}
                    {{method_field('GET')}}
                    <div class="input-group">
                        <input type="text" name="busca" class="form-control" placeholder="PESQUISAR NO SITE">
                        <span class="input-group-btn">
                            <button class="btn">{!! Html::image('img/icon_lupa.png', 'Buscar') !!}</button>
                        </span>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    {{--Fim Buscar--}}
    {{--Inicio noticias--}}
    <div class="container margin-top-20 margin-bottom-50">
        <div class="row">
            <div class="container-title-flex margin-bottom-10">
                {!! Html::image('img/icon-noticia.png', 'Noticias') !!}
                <h4 class="text-uppercase">Destaques</h4>
            </div>
            @include('elements._destaques')
        </div>
        <div class="row margin-top-40">
            <div class="container-title-noticias margin-bottom-20">
                {!! Html::image('img/icon-noticia.png', 'Noticias') !!}
                <h4 class="text-uppercase">Mais Noticias</h4>
                <a class="text-right" href="{{route('noticia.lista')}}">Mostrar todas as Noticias</a>
            </div>

            @include('elements._maisNoticias')

        </div>
    </div>
    {{--Fim noticias--}}
    {{--Inicio Brasil transparente--}}
    <div class="container-fluid margin-top-20 margin-bottom-20">
        <div class="row topo-brasil-transparente">
            <div class="col-md-12">
                <h3 class="text-uppercase title-responsive visible-sm visible-xs text-center">Brasil Transparente</h3>
                <div class="container-brasil-transparente">
                    <div class="title-brasil-transparente">
                        <h3 class="text-uppercase text-center">Brasil Transparente</h3>
                    </div>
                </div>
            </div>
        </div>
        @include('elements._portalTransparencia')
    </div>
    {{--Fim Brasil transparente--}}
    {{--Inicio Mapa de Serviços--}}
    <div class="container-fluid margin-top-30 container-mapa-services">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="mapa-servico margin-bottom-20">
                    <div class="title text-center">
                        <h3 class="reset-margin">Mapa de Serviços</h3>
                    </div>
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe src="https://www.google.com/maps/d/embed?mid=175flLqVaTB39qdVYzmtWbuXfQZzbsQuk" width="640" height="480"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--Fim Mapa de Serviços--}}
    {{--Inicio Sociais--}}
    <div class="container-fluid sociais">
        <div class="container">
            <div class="row margin-top-20 margin-bottom-20">
                <div class="col-md-4">
                    <div class="sociais-header">
                        <div class="icon">
                            {!! Html::image('img/lista.png', 'icon', ['class' => 'img-responsive']) !!}
                        </div>
                        <div class="title">
                            Últimas Publicações
                        </div>
                        <div class="icon-right">
                            <a href="{{route('publicacao')}}">
                                {!! Html::image('img/seta.png', 'icon', ['class' => 'img-responsive']) !!}
                            </a>
                        </div>
                    </div>
                    <div class="sociais-content margin-top-10">
                        @include('elements._ultimasPublicacoes')
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sociais-header">
                        <div class="icon" style="padding: 0">
                            {!! Html::image('img/icon-camera.png', 'icon', ['class' => 'img-responsive']) !!}
                        </div>
                        <div class="title">
                            Álbuns de Fotos
                        </div>
                        <div class="icon-right">
                            <a href="{{route('galeria')}}">
                                <i style="color: #ffffff" class="glyphicon glyphicon-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="sociais-content margin-top-10">
                        @include('elements._galeriaIndex')
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sociais-header">
                        <div class="icon" style="padding: 0">
                            {!! Html::image('img/face-white.png', 'icon', ['class' => 'img-responsive']) !!}
                        </div>
                        <div class="title">
                            Rede Social
                        </div>
                        <div class="icon-right">
                            <i style="color: #ffffff" class="glyphicon glyphicon-plus"></i>
                        </div>
                    </div>
                    <div class="sociais-content margin-top-10">
                        <div class="embed-responsive embed-responsive-16by9" style="height: 290px;">
                            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fprefeituradecamapuams&tabs=timeline&width=349&height=500&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
                                    width="349" height="500" style="border:none;overflow:hidden" scrolling="no"
                                    frameborder="0" allowTransparency="true"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--Fim Sociais--}}
    {{--Inicio Organizacao--}}
    <div class="container-fluid margin-top-50 margin-top-20">
        <div class="row topo-organizacao">
            <div class="col-md-12">
                <h3 class="text-uppercase title-responsive text-center visible-xs visible-sm">Organizações da Sociedade
                    Civil</h3>
                <div class="container-organizacao">
                    <div class="title-organizacao">
                        <h3 class="text-uppercase text-center">Organizações da Sociedade Civil</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="container margin-top-20 margin-bottom-20">
            <div class="row">
               @include('elements._publicacao_sociedade_civil')
            </div>
        </div>
    </div>
    {{--Fim Organizacao--}}

    {{--Inicio links Uteis--}}
    <div class="container-fluid margin-bottom-20 margin-top-20">
        <div class="row topo-brasil-transparente">
            <div class="col-md-12">
                <h3 class="text-uppercase text-center title-responsive visible-sm visible-xs">Links Úteis</h3>
                <div class="container-links">
                    <div class="title-links">
                        <h3 class="text-uppercase text-center">Links Úteis</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="container margin-top-10 margin-bottom-10">
            @include('elements._linksUteis')
        </div>
    </div>
    </div>
@endsection
