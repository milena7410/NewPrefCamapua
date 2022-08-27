@extends('template.template')

@section('content')
    <div class="container margin-top-20 margin-bottom-40">
        <h3>Galeria de Imagens</h3>
        <div class="row margin-top-20">
            @forelse($galerias as $galeria)
                <div class="col-md-3">
                    <a class="link-unstyled" href="{{route('galeria.show',$galeria->id)}}" title="{{$galeria->galeria}}">
                        <div class="card-container">
                            <img src="{{$galeria->getFotoCapa()}}" class="img-responsive" alt="{{$galeria->titulo}}">
                            <div class="card-description">
                                <h4>{{$galeria->titulo}} </h4>
                                <p>{{$galeria->data_galeria}}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-md-3 text-center">
                    <strong>Nenhum galeria encontrada</strong>
                </div>
            @endforelse
        </div>
    </div>
@endsection
