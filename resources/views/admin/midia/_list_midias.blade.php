<div class="table-responsive">
    <table class="table table-striped font-12" id="datatable">
        <thead>
        <tr>
            <th class="col-lg-1">Cód</th>
            <th>Descrição</th>
            <th>Url</th>
            <th>Tipo Mídia</th>
            <th class="col-lg-1">Ativo</th>
            <th class="col-lg-3"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($midias as $midia)
            <tr>
                <td>{{ $midia->id }}</td>
                <td>{{ $midia->descricao }}</td>
                <td>{{asset($midia->getArquivo())}}</td>
                <td>
                    @if($midia->isAtivo())
                        <label class="label label-success">Sim</label>
                    @else
                        <label class="label label-danger">Não</label>
                    @endif

                </td>
                <td>{{ getExtensionByMimetype($midia->mimetype) }}</td>
                <td>
                    <a class="btn btn-xs btn-flat btn-primary" target="_blank"
                       href="{{asset($midia->getArquivo())}}" title="Download">
                        <i class="fa fa-download"></i> Arquivo
                    </a>
                    @if($midia->isAtivo())
                        <a class="btn btn-xs btn-flat btn-warning"
                           href="{{route('admin.midia.changeStatus', [$midia->id,'0'])}}" title="Remover">
                            <i class="fa fa-lock"></i> Desativar
                        </a>
                    @else
                        <a class="btn btn-xs btn-flat btn-success"
                           href="{{route('admin.midia.changeStatus', [$midia->id,'1'])}}" title="Remover">
                            <i class="fa fa-unlock"></i> Ativar
                        </a>
                    @endif

                    <a class="btn btn-xs btn-flat btn-danger" href="{{route('admin.midia.remove', [$midia->id])}}"
                       title="Remover">
                        <i class="fa fa-trash"></i> Remover
                    </a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>