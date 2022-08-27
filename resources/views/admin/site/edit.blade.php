@extends('templates.admin')


@section('content')
    <div class="main-container">
        <div class="page-header font-header"> Página Inicial</div>
        <ol class="breadcrumb">
            <li><a href="#">Configurações</a></li>
            <li class="active">Página Inicial</li>
        </ol>

        <div class="content-wrap">
            <div class="panel panel-default">
                <div class="panel-heading font-header">Formulário de Edição dos Dados da Página Inicial</div>
                <div class="panel-body">
                    @include('admin.errors._check_form')
                    @include('flash::message')

                    {!! Form::model($dados,['route' => ['admin.site.update',$dados->id],
                    'class' => 'form-horizontal font-12']) !!}
                    {{method_field('PUT')}}

                    @include('admin.site._form_site')

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-sm-offset-5 col-sm-7">
                                <div class="btn-toolbar">
                                    {!! Form::submit('Salvar',['class' => 'btn btn-success btn-flat']) !!}
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
    {!! Html::script('painel/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') !!}
    {!! Html::script('painel/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.pt-BR.min.js') !!}
    {!! Html::script('painel/js/libs/jquery.quicksearch.js') !!}
    {!! Html::script('painel/plugins/multi-select/js/jquery.multi-select.js') !!}
    <script>
        $('.datepicker').datepicker({
            format: "dd/mm/yyyy",
            language: "pt-BR"
        });

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
@endsection