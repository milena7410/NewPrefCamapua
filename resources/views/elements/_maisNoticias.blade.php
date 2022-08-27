@foreach($noticias as $noticia)
    <div class="col-md-2">
        <div class="card-noticias">
            <a href="{{route('noticia',['url' => $noticia->url])}}">
                <figure>
                    {!! Html::image($noticia->getImagem(), $noticia->imagem, ['class' => 'img-responsive']) !!}
                    <p>{{$noticia->data_publicacao}} as {{$noticia->hora_publicacao}}</p>
                    <figcaption>
                        {{str_limit($noticia->titulo,140)}}
                    </figcaption>
                </figure>
            </a>
        </div>
    </div>
@endforeach