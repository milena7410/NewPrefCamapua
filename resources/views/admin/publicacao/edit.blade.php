@extends('templates.admin')


@section('content')
    <div class="main-container">
        <div class="page-header font-header"> Editar de Publicação</div>
        <ol class="breadcrumb">
            <li><a href="#">Administrativo</a></li>
            <li><a href="#">Links Publicações</a></li>
            <li><a href="{{route('admin.publicacao.index')}}">Listar Publicações</a></li>
            <li class="active">Editar</li>
        </ol>

        <div class="content-wrap">
            <div class="panel panel-default">
                <div class="panel-heading font-header">Formulário de Edição de Publicação</div>
                <div class="panel-body">
                    @include('admin.errors._check_form')
                    @include('flash::message')

                    {!! Form::model($publicacao,['route' => ['admin.publicacao.update',$publicacao->id],
                    'class' => 'form-horizontal font-12']) !!}
                    {{method_field('PUT')}}

                    @include('admin.publicacao._form_publicacao')

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-sm-offset-4 col-sm-7">
                                <div class="btn-toolbar">
                                    {!! Form::submit('Salvar Alterações',['class' => 'btn btn-success btn-flat']) !!}
                                    <a href="{{route('admin.publicacao.index')}}" class="btn btn-danger btn-flat">
                                        Cancelar
                                    </a>
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
    {!! Html::script('painel/js/libs/validator.js') !!}
    {!! Html::script('painel/js/libs/jquery.mask.js') !!}
    {!! Html::script('painel/js/mascaras.js') !!}
    {!! Html::script('painel/js/libs/jquery.quicksearch.js') !!}
    {!! Html::script('painel/plugins/multi-select/js/jquery.multi-select.js') !!}
    <script>
        $(function () {
            $('#secretariasSelect').multiSelect({
                selectableHeader: "<input type='text' class='form-control' style='margin-bottom: 10px' autocomplete='off' placeholder='Informe a Secretaria'>",
                selectionHeader: "<input type='text' class='form-control' style='margin-bottom: 10px' autocomplete='off' placeholder='Informe a Secretaria'>",
                afterInit: function(ms){
                    var that = this,
                        $selectableSearch = that.$selectableUl.prev(),
                        $selectionSearch = that.$selectionUl.prev(),
                        selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
                        selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

                    that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                        .on('keydown', function(e){
                            if (e.which === 40){
                                that.$selectableUl.focus();
                                return false;
                            }
                        });

                    that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                        .on('keydown', function(e){
                            if (e.which == 40){
                                that.$selectionUl.focus();
                                return false;
                            }
                        });
                },
                afterSelect: function(){
                    this.qs1.cache();
                    this.qs2.cache();
                },
                afterDeselect: function(){
                    this.qs1.cache();
                    this.qs2.cache();
                }
            });

        });
    </script>
@stop