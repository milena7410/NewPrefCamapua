<div class="container margin-top-50">
    <div class="row margin-bottom-20">
        @foreach($portalLinks as $portal)
            <div class="col-md-3 margin-top-20">
                <a class="link-unstyled-hover" href="{{$portal->url}}" target="{{$portal->getTargetName()}}">
                    <div class="card-brasil-transparente">
                        {!! Html::image($portal->getImagem(), $portal->imagem, ['class' => 'img-responsive']) !!}
                        <div class="transparencia-descricao text-justify">
                            <h4>{{$portal->titulo}}</h4>
                            <p>{{$portal->subtitulo}}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>