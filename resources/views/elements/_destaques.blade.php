@if(count($destaques) > 0)
    <div class="col-md-6 margin-top-10">
        <div id="slider-noticias" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <a href="{{route('noticia',['url' => $destaques->first()->url])}}">
                        {!! Html::image($destaques->first()->getImagem(), $destaques->first()->imagem,  ['class' => 'img-responsive']) !!}
                        <div class="carousel-caption">
                            <h3>{{$destaques->first()->titulo}}</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endif
<div class="col-md-6 margin-top-10">
    <div class="container-noticias">
        @foreach($destaques as $destaque)
            @if($loop->index == 1)
                <div class="noticia-destaque-container">
                    <div class="description description-gray">
                        <a href="{{route('noticia',['url' => $destaque->url])}}">
                            <h4>{{$destaque->titulo}}</h4>
                            <p>{{ ($destaque->descricao) }}</p>
                        </a>
                    </div>
                    <div>
                        <a href="{{route('noticia',['url' => $destaque->url])}}">
                            {!! Html::image($destaque->getImagem(), $destaque->imagem, ['class' => 'img-responsive']) !!}
                        </a>
                    </div>

                </div>
            @endif

            @if($loop->index == 2)
                <div class="noticia-destaque-container margin-top-10">
                    <div>
                        <a href="{{route('noticia',['url' => $destaque->url])}}" class="">
                            {!! Html::image($destaque->getImagem(), $destaque->imagem, ['class' => 'img-responsive']) !!}
                        </a>
                    </div>
                    <div class="description description-orange">
                        <a href="{{route('noticia',['url' => $destaque->url])}}">
                            <h4>{{$destaque->titulo}}</h4>
                            <p>{{ ($destaque->descricao) }}</p>
                        </a>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>