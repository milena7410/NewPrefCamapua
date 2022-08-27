<div class="table-responsive">
    <table class="table table-striped font-12" id="datatable">
        <thead>
        <tr>
            <th class="col-lg-1">Cód</th>
            <th>Cargo</th>
            <th class="col-lg-1">Ativo</th>
            <th class="col-lg-3"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($cargos as $cargo)
            <tr>
                <td>{{ $cargo->id }}</td>
                <td>{{ $cargo->cargo }}</td>
                <td>
                    @if($cargo->isAtivo())
                        <label class="label label-success">Sim</label>
                    @else
                        <label class="label label-danger">Não</label>
                    @endif

                </td>
                <td>
                    <a class="btn btn-xs btn-flat btn-primary" href="{{route('admin.cargo.edit', [$cargo->id])}}" title="Editar">
                        <i class="fa fa-edit"></i> Editar
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>