@extends('templates.admin')

@section('additional_stylesheet')
    {!! Html::style('painel/css/summernote.min.css') !!}
    {!! Html::style('painel/plugins/multi-select/css/multi-select.css',['media' => 'screen']) !!}
    <style>
        .ms-container {
            width: 97%;
        }
    </style>
@stop

@section('content')
    <div class="main-container">
        <div class="page-header font-header"> Editar Página {{$pagina->titulo}}</div>
        <ol class="breadcrumb">
            <li>Páginas</li>
            <li><a href="{{route('admin.pagina.showAll')}}">Listas Páginas</a></li>
            <li class="active">Editar</li>
        </ol>

        <div class="content-wrap">
            @include('admin.errors._check_form')
            <div class="text-center">
                @include('flash::message')
            </div>
            <div class="panel panel-default">
                <div class="panel-heading font-header">Formulário de Edição da Página {{$pagina->titulo}}</div>
                <div class="panel-body">

                    {!! Form::model($pagina,['route' => ['admin.pagina.update', $pagina->id], 'method' => 'put',
                    'class' => 'form-horizontal font-12']) !!}

                    @include('admin.pagina._form_pagina')

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-sm-offset-5 col-sm-8">
                                <div class="btn-toolbar">
                                    {!! Form::submit('Salvar',['class' => 'btn btn-success']) !!}
                                    <a href="{{route('admin.pagina.showAll')}}" class="btn btn-danger">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop

@section('additional_scripts')
    {!! Html::script('painel/js/libs/summernote/summernote.min.js') !!}
    {!! Html::script('painel/js/libs/summernote/summernote-pt-BR.js') !!}
    {!! Html::script('painel/js/libs/jquery.quicksearch.js') !!}
    {!! Html::script('painel/plugins/multi-select/js/jquery.multi-select.js') !!}
    <script>
        $(".summernote").summernote({
            lang: "pt-BR",
            height: 500
        });

        $(function () {
            $('#secretariasSelect').multiSelect({
                selectableHeader: "<input type='text' class='form-control' style='margin-bottom: 10px' autocomplete='off' placeholder='Informe a Secretaria'>",
                selectionHeader: "<input type='text' class='form-control' style='margin-bottom: 10px' autocomplete='off' placeholder='Informe a Secretaria'>",
                afterInit: function (ms) {
                    var that = this,
                        $selectableSearch = that.$selectableUl.prev(),
                        $selectionSearch = that.$selectionUl.prev(),
                        selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                        selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

                    that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                        .on('keydown', function (e) {
                            if (e.which === 40) {
                                that.$selectableUl.focus();
                                return false;
                            }
                        });

                    that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                        .on('keydown', function (e) {
                            if (e.which == 40) {
                                that.$selectionUl.focus();
                                return false;
                            }
                        });
                },
                afterSelect: function () {
                    this.qs1.cache();
                    this.qs2.cache();
                },
                afterDeselect: function () {
                    this.qs1.cache();
                    this.qs2.cache();
                }
            });

        });
    </script>
@stop