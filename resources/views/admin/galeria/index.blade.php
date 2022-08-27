@extends('templates.admin')

@section('additional_stylesheet')
    {!! Html::style('painel/css/dataTables.bootstrap.css') !!}
    <style>
        #datatable-result {
            min-height: 600px;
        }
    </style>
@stop

@section('content')
    <div class="main-container">
        <div class="page-header font-header"> Listagem de Galeria</div>
        <ol class="breadcrumb">
            <li><a href="javascript:void(0);">Administrativo</a></li>
            <li><a href="#">Galeria</a></li>
            <li class="active">Listar Galeria</li>
        </ol>

        <div class="content-wrap">
            @include('flash::message')
            <div class="panel panel-default">
                <div class="table-responsive" id="datatable-result">
                    <table class="table table-striped font-12" id="datatable">
                        <thead>
                        <tr>
                            <th class="col-lg-1">Cód</th>
                            <th>Galeria</th>
                            <th>Data</th>
                            <th class="col-lg-1">Ativo</th>
                            <th class="col-lg-3"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($galerias as $galeria)
                            <tr>
                                <td>{{ $galeria->id }}</td>
                                <td>{{ $galeria->titulo }} </td>
                                <td>{{ $galeria->data_galeria }} </td>
                                <td>
                                    @if($galeria->isAtivo())
                                        <label class="label label-success">Sim</label>
                                    @else
                                        <label class="label label-danger">Não</label>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-xs btn-flat btn-primary"
                                       href="{{route('admin.galeria.edit',[$galeria->id])}}" title="Editar">
                                        <i class="fa fa-edit"></i> editar
                                    </a>

                                    <a class="btn btn-xs btn-flat btn-success"
                                       href="{{route('admin.foto.edit',[$galeria->id])}}" title="Adicionar Imagens">
                                        <i class="fa fa-image"></i> Imagens
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop


@section('additional_scripts')
    {!! Html::script('painel/js/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('painel/js/datatables/dataTables.bootstrap.min.js') !!}

    <script>
        $('#datatable').DataTable({
            "order": [[ 0, "desc" ]],
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
    </script>
@stop