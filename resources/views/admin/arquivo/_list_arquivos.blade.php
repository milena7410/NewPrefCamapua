<div class="table-responsive">
    <table class="table table-striped font-12" id="datatable">
        <thead>
        <tr>
            <th class="col-lg-1">Cód</th>
            <th>Nome</th>
            <th class="col-lg-1">Ativo</th>
            <th class="col-lg-3"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($arquivos as $arquivo)
            <tr>
                <td>{{ $arquivo->id }}</td>
                <td>{{ $arquivo->descricao }}</td>
                <td>
                    @if($arquivo->isAtivo())
                        <label class="label label-success">Sim</label>
                    @else
                        <label class="label label-danger">Não</label>
                    @endif

                </td>
                <td>
                    <a class="btn btn-xs btn-flat btn-primary" target="_blank"
                       href="{{asset($arquivo->getArquivo())}}" title="Download">
                        <i class="fa fa-download"></i> Arquivo
                    </a>
                    @if($arquivo->isAtivo())
                        <a class="btn btn-xs btn-flat btn-warning"
                           href="{{route('admin.arquivo.changeStatus', [$arquivo->id,'0'])}}" title="Remover">
                            <i class="fa fa-lock"></i> Desativar
                        </a>
                    @else
                        <a class="btn btn-xs btn-flat btn-success"
                           href="{{route('admin.arquivo.changeStatus', [$arquivo->id,'1'])}}" title="Remover">
                            <i class="fa fa-unlock"></i> Ativar
                        </a>
                    @endif

                    <a class="btn btn-xs btn-flat btn-danger" href="{{route('admin.arquivo.remove', [$arquivo->id])}}"
                       title="Remover">
                        <i class="fa fa-trash"></i> Remover
                    </a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>