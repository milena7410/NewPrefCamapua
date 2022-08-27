<div class="container margin-top-50">
    <div class="row margin-bottom-20">
        @forelse($publicacoes as $link)
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

        @empty

            <div class="col-md-4 margin-top-20">
                <div class="container">
                    <div class="text-center">
                        <p>Nenhuma publicação informada</p>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
</div>
