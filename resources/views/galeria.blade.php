@extends('template.template')
@push('styles')
    {!! Html::style('libs/blueimp/css/blueimp-gallery.min.css') !!}
@endpush
@section('content')
    <div class="container margin-top-20 margin-bottom-40" id="links">
        <h3>Galeria de Imagens</h3>
        <div class="row margin-top-20">
            <div class="col-md-3">
                <a class="link-unstyled" href="https://goo.gl/nmoeir" title="Cidade">
                    <div class="card-container">
                        <img src="https://goo.gl/nmoeir" class="img-responsive" alt="">
                        <div class="card-description">
                            <h4>Autor:
                                <small>Napa Trola</small>
                            </h4>
                            <p>{{\Illuminate\Support\Carbon::now()->format('d/m/Y')}}</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a class="link-unstyled" href="https://goo.gl/nmoeir" title="Cidade">
                    <div class="card-container">
                        <img src="https://goo.gl/nmoeir" class="img-responsive" alt="">
                        <div class="card-description">
                            <h4>Autor:
                                <small>Napa Trola</small>
                            </h4>
                            <p>{{\Illuminate\Support\Carbon::now()->format('d/m/Y')}}</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a class="link-unstyled" href="https://goo.gl/nmoeir" title="Cidade">
                    <div class="card-container">
                        <img src="https://goo.gl/nmoeir" class="img-responsive" alt="">
                        <div class="card-description">
                            <h4>Autor:
                                <small>Napa Trola</small>
                            </h4>
                            <p>{{\Illuminate\Support\Carbon::now()->format('d/m/Y')}}</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a class="link-unstyled" href="https://goo.gl/nmoeir" title="Cidade">
                    <div class="card-container">
                        <img src="https://goo.gl/nmoeir" class="img-responsive" alt="">
                        <div class="card-description">
                            <h4>Autor:
                                <small>Napa Trola</small>
                            </h4>
                            <p>{{\Illuminate\Support\Carbon::now()->format('d/m/Y')}}</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row margin-top-20">
            <div class="col-md-3">
                <a class="link-unstyled" href="https://goo.gl/nmoeir" title="Cidade">
                    <div class="card-container">
                        <img src="https://goo.gl/nmoeir" class="img-responsive" alt="">
                        <div class="card-description">
                            <h4>Autor:
                                <small>Napa Trola</small>
                            </h4>
                            <p>{{\Illuminate\Support\Carbon::now()->format('d/m/Y')}}</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a class="link-unstyled" href="https://goo.gl/nmoeir" title="Cidade">
                    <div class="card-container">
                        <img src="https://goo.gl/nmoeir" class="img-responsive" alt="">
                        <div class="card-description">
                            <h4>Autor:
                                <small>Napa Trola</small>
                            </h4>
                            <p>{{\Illuminate\Support\Carbon::now()->format('d/m/Y')}}</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a class="link-unstyled" href="https://goo.gl/nmoeir" title="Cidade">
                    <div class="card-container">
                        <img src="https://goo.gl/nmoeir" class="img-responsive" alt="">
                        <div class="card-description">
                            <h4>Autor:
                                <small>Napa Trola</small>
                            </h4>
                            <p>{{\Illuminate\Support\Carbon::now()->format('d/m/Y')}}</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a class="link-unstyled" href="https://goo.gl/nmoeir" title="Cidade">
                    <div class="card-container">
                        <img src="https://goo.gl/nmoeir" class="img-responsive" alt="">
                        <div class="card-description">
                            <h4>Autor:
                                <small>Napa Trola</small>
                            </h4>
                            <p>{{\Illuminate\Support\Carbon::now()->format('d/m/Y')}}</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
        <div class="slides"></div>
        <h3 class="title"></h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>
    </div>
@endsection
@push('javascript')
    {!! Html::script('libs/blueimp/js/blueimp-gallery.min.js') !!}
    <script>
        document.getElementById('links').onclick = function (event) {
            event = event || window.event;
            var target = event.target || event.srcElement,
                link = target.src ? target.parentNode : target,
                options = {index: link, event: event},
                links = this.getElementsByTagName('a');
            blueimp.Gallery(links, options);
        };
    </script>
@endpush