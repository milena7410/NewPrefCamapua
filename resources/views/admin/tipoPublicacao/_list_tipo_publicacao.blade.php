<div class="table-responsive">
    <table class="table table-striped font-12" id="datatable">
        <thead>
        <tr>
            <th class="col-lg-1">Cód</th>
            <th>Tipo Publicação</th>
            <th class="col-lg-1">Ativo</th>
            <th class="col-lg-3"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($tipos as $tipo)
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
                    <a class="btn btn-xs btn-flat btn-primary" href="{{route('admin.tipo.edit', [$tipo->id])}}" title="Editar">
                        <i class="fa fa-edit"></i> Editar
                    </a>

                    <a class="btn btn-xs btn-flat btn-dark" href="{{route('admin.subtipo.create', [$tipo->id])}}" title="Adicionar Subtipo">
                        <i class="fa fa-list"></i> Subtipo
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>