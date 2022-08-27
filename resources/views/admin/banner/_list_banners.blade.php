<div class="table-responsive">
    <table class="table table-striped font-12" id="datatable">
        <thead>
        <tr>
            <th>Cód</th>
            <th>Imagem</th>
            <th>Link</th>
            <th class="col-lg-1">Ativo</th>
            <th class="col-lg-3"></th>
        </tr>
        </thead>
        <tbody>
        @forelse($banners as $banner)
            <tr>
                <td>{{ $banner->id }}</td>
                <td>
                    {!! Html::image($banner->getBannerPath(),$banner->slider,['class' => 'profile-pick','width' => '100']) !!}
                </td>
                <td>{{$banner->link}}</td>
                <td>
                    @if($banner->ativo)
                        <label class="label label-success">Sim</label>
                    @else
                        <label class="label label-danger">Não</label>
                    @endif
                </td>
                <td>
                    @if($banner->ativo)
                        <a href="{{route('admin.banner.status', [$banner->id,0])}}"
                           class="btn btn-warning btn-flat btn-xs">
                            <i class="icon icon-lock"></i> Desativar
                        </a>
                    @else
                        <a href="{{route('admin.banner.status', [$banner->id,1])}}"
                           class="btn btn-success btn-flat btn-xs">
                            <i class="icon icon-unlocked"></i> Ativar
                        </a>
                    @endif

                        <a href="{{route('admin.banner.destroy', [$banner->id])}}"
                           class="btn btn-danger btn-flat btn-xs">
                            <i class="glyphicon glyphicon-trash"></i> Remover
                        </a>
                </td>
            </tr>
        @empty
            <tr class="text-center">
                <td colspan="6"><b>Nenhum Banner Cadastrado.</b></td>
            </tr>
        @endforelse

        </tbody>
    </table>
</div>