@extends('template.template')
@section('content')
<div class="container margin-top-20 margin-bottom-40">
    <div class="row">
        <div class="margin-bottom-40">
            <h3 class="text-uppercase">{{ $pagina->titulo }}</h3>
        </div>
        <div class="col-md-12">
            {!! $pagina->conteudo !!}
        </div>
    </div>
</div>
@endsection