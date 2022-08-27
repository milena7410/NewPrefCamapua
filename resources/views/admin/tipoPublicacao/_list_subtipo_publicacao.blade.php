<div class="table-responsive">
    <table class="table table-striped font-12" id="datatable">
        <thead>
        <tr>
            <th class="col-lg-1">Cód</th>
            <th>Subtipo Publicação</th>
            <th class="col-lg-1">Ativo</th>
            <th class="col-lg-3"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($subtipos as $tipo)
            <tr>
                <td>{{ $tipo->id }}</td>
                <td>{{ $tipo->tipo }}</td>
                <td>
                    @if($tipo->isAtivo())
                        <label class="label label-success">Sim</label>
                    @else
                        <label class="label label-danger">Não</label>
                    @endif

                </td>
                <td>
                    @if($tipo->isAtivo())
                        <a class="btn btn-xs btn-flat btn-warning"
                           href="{{route('admin.tipo.changeStatus', [$tipo->id,'0'])}}" title="Remover">
                            <i class="fa fa-lock"></i> Desativar
                        </a>
                    @else
                        <a class="btn btn-xs btn-flat btn-success"
                           href="{{route('admin.tipo.changeStatus', [$tipo->id,'1'])}}" title="Remover">
                            <i class="fa fa-unlock"></i> Ativar
                        </a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>