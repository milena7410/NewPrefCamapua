@extends('templates.admin')

@section('additional_stylesheet')
    {!! Html::style('painel/css/dataTables.bootstrap.css') !!}
    <style>
        #datatable-result {
            min-height: 550px;
        }
    </style>
@stop

@section('content')
    <div class="main-container">
        <div class="page-header font-header"> Páginas Institucionais</div>
        <ol class="breadcrumb">
            <li><a href="#">Administrativo</a></li>
            <li><a href="#">Páginas</a></li>
            <li class="active">Institucional</li>
        </ol>

        <div class="content-wrap">
            @include('flash::message')
            <div class="panel panel-default">
                <div class="table-responsive" id="datatable-result">
                    <table class="table table-striped font-12" id="datatable">
                        <thead>
                        <tr>
                            <th class="col-lg-1">Cód</th>
                            <th>Página</th>
                            <th>Principal</th>
                            <th class="col-lg-2">URL</th>
                            <th class="col-lg-1">Ativo</th>
                            <th class="col-lg-2"></th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($paginas as $pagina)
                            <tr>
                                <td>{{$pagina->id}}</td>
                                <td>{{$pagina->titulo}}</td>
                                <td>
                                    @if($pagina->isPrincipal())
                                        <label class="label label-success">Sim</label>
                                    @else
                                        <label class="label label-danger">Não</label>
                                    @endif
                                </td>
                                <td>{{$pagina->url}}</td>
                                <td>
                                    @if($pagina->isAtivo())
                                        <label class="label label-success">Sim</label>
                                    @else
                                        <label class="label label-danger">Não</label>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-dark">Ações</button>
                                        <button type="button" class="btn btn-dark dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="caret"></span>
                                            <span class="sr-only">Ações</span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{route('admin.pagina.edit', [$pagina->id])}}">
                                                    Editar
                                                </a>
                                            </li>
                                            <li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="text-center">
                                <td colspan="5"><b>Nenhuma Página Cadastrada.</b></td>
                            </tr>
                        @endforelse

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