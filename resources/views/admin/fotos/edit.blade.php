@extends('templates.admin')

@section('content')
    <style>
        .portfolio-item:hover .portfolio-caption {
            background-color: transparent;
        }
    </style>
    <div class="main-container">
        <div class="page-header font-header"> Editar Imagens da Galeria</div>
        <ol class="breadcrumb">
            <li><a href="#">Administrativo</a></li>
            <li><a href="#">Galerias</a></li>
            <li><a href="{{route('admin.galeria.index')}}">Listar Todos Galerias</a></li>
            <li class="active">Editar Imagens da Galeria</li>
        </ol>

        <div class="content-wrap">
            <div class="panel panel-default">
                <div class="panel-heading font-header">Imagens da Galeria</div>
                <div class="panel-body">
                    @include('flash::message')
                    <div class="row">
                        @foreach($imagens as $imagem)
                            <?php $principal = ($imagem->isCapa()) ? 'disabled' : ''; ?>
                            <div class="col-sm-6 col-md-3">
                                <div class="portfolio-item">
                                    <div class="img-wrap">
                                        {!! Html::image($imagem->getImagem(),$imagem->foto,['class' => 'img-responsive center-block','width' => 400]) !!}
                                    </div>
                                    <div class="portfolio-caption">
                                        <a href="#principal" data-toggle="modal" data-target=".model-image-main"
                                           data-cod="{{ $imagem->id }}" data-prod="{{$imagem->galeria_id}}"
                                           class="btn btn-primary main-image" {{$principal}}>
                                            Principal
                                        </a>

                                        @if(!$imagem->isCapa())
                                            <a href="#excluir" data-toggle="modal" data-target=".model-remove-image"
                                               class="btn btn-danger remove-image" data-cod="{{ $imagem->id }}">
                                                <i class="glyphicon glyphicon-trash"></i> Excluir
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-sm-6 col-md-2">
                            <div class="portfolio-item">
                                <div class="img-wrap">
                                    {!! Html::image('/img/no-image.png','blank',['class' => 'img-responsive']) !!}
                                </div>
                                <div class="portfolio-caption">
                                    <a href="#upload" class="btn btn-default upload-image" data-toggle="modal"
                                       data-target=".model-upload-image"
                                       data-prod="{{$galeriaId}}">
                                        <i class="glyphicon glyphicon-upload"></i> Upload
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.fotos.modals._modal_upload_image')
    @include('admin.fotos.modals._modal_remove_image')
    @include('admin.fotos.modals._modal_define_main_image')
@stop

@section('additional_scripts')
    <script>
        var idImage = 0;
        var idProd = 0;

        function confirmMainImage() {
            $.get('/admin/define-foto-principal/' + idImage + '/' + idProd, function () {
                window.location.reload();
            });
        }

        function confirmImageRemove() {
            $.get('/admin/remove-foto-galeria/' + idImage, function () {
                window.location.reload();
            });
        }

        $(document).ready(function () {
            $('.remove-image').on('click', function () {
                idImage = $(this).attr('data-cod');
            });

            $('.main-image').on('click', function () {
                idImage = $(this).attr('data-cod');
                idProd = $(this).attr('data-prod');
            });


            $('.upload-image').on('click', function () {
                idProd = $(this).attr('data-prod');
                $('#idProdUpload').val(idProd);
            });

        });
    </script>
@stop