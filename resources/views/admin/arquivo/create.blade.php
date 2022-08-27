@extends('templates.admin')

@section('additional_stylesheet')
    {!! Html::style('painel/css/dataTables.bootstrap.css') !!}
    {!! Html::style('painel/css/summernote.min.css') !!}
@stop

@section('content')
    <div class="main-container">
        <div class="page-header font-header">Arquivos</div>
        <ol class="breadcrumb">
            <li><a href="#">Administrativo</a></li>
            <li><a href="{{ route('admin.publicacao.index') }}">Publicações</a></li>
            <li class="active">Arquivos</li>
        </ol>

        <div class="content-wrap">
            @include('admin.errors._check_form')
            @include('flash::message')
            <div class="panel panel-default">
                <div class="panel-heading font-header">Formulário de Cadastro de Arqvuios</div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'admin.arquivo.store', 'method' => 'post', 'files' => true,
                            'class' => 'form-horizontal font-12']) !!}

                    @include('admin.arquivo._form_arquivo')

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-sm-offset-4 col-sm-7">
                                <div class="btn-toolbar">
                                    {!! Form::submit('Cadastrar',['class' => 'btn btn-flat btn-success']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <hr>
                @include('admin.arquivo._list_arquivos')
            </div>
        </div>
    </div>
@stop

@section('additional_scripts')
    {!! Html::script('painel/js/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('painel/js/datatables/dataTables.bootstrap.min.js') !!}
    {!! Html::script('painel/js/libs/summernote/summernote.min.js') !!}
    {!! Html::script('painel/js/libs/summernote/summernote-pt-BR.js') !!}
    <script>
        $(".summernote").summernote({
            lang: "pt-BR"
        });

        $(document).ready(function () {
            $('#datatable').DataTable({
                oLanguage: {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                        "sNext": "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    },
                    "oAria": {
                        "sSortAscending": ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    }
                }
            });
        });
    </script>
@stop