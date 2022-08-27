@forelse($galerias as $galeria)
    <div class="content-row">
        <div class="icon">
            <a href="{{route('galeria.show',$galeria->id)}}">
                {!! Html::image($galeria->getFotoCapa(), $galeria->titulo, ['class' => 'img-responsive','width' => 55]) !!}
            </a>
        </div>
        <div class="text">
            <a href="{{route('galeria.show',$galeria->id)}}">
                <h4>{{$galeria->titulo}}</h4>
                <p>{{str_limit($galeria->descricao)}}</p>
            </a>
        </div>
    </div>
@empty
    <div class="content-row">
        <strong>Nenhuma Galeria encontrada.</strong>
    </div>
@endforelse