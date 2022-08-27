@foreach($publicacoes as $publicacao)
    <div class="content-row">
        <div class="icon">
            <a href="{{ route('publicacao.url',$publicacao->url) }}">
            {!! Html::image('img/lista.png', 'icon') !!}
            </a>
        </div>
        <div class="text">
            <a href="{{ route('publicacao.url',$publicacao->url) }}">
                <p>{{$publicacao->numero}}/{{$publicacao->ano}} - {{$publicacao->nome}}</p>
            </a>
        </div>
        <div class="icon-busca">
            <a href="{{ route('publicacao.url',$publicacao->url) }}">
                {!! Html::image('img/busca-azul.png', 'icon') !!}
            </a>
        </div>
    </div>
@endforeach