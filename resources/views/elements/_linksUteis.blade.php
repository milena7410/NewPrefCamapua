<div class="container margin-top-50">
    <div class="row margin-bottom-20">
        @foreach($links as $link)
            <div class="col-md-3 margin-top-20">
                <a class="link-unstyled-hover" href="{{$link->url}}" target="{{$link->getTargetName()}}">
                    <div class="card-brasil-transparente">
                        {!! Html::image($link->getImagem(), $link->imagem, ['class' => 'img-responsive']) !!}
                        <div class="transparencia-descricao text-justify">
                            <h4>{{$link->titulo}}</h4>
                            <p>{{$link->subtitulo}}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>