@extends('templates.admin')

@section('content')
    <div class="main-container">
        <div class="page-header font-header"> Lista de Usuários</div>
        <ol class="breadcrumb">
            <li><a href="#">Administrativo</a></li>
            <li><a href="#">Usuários</a></li>
            <li class="active">Listar Usuários</li>
        </ol>

        <div class="content-wrap">
            @include('flash::message')
            <div class="panel panel-default">
                <div class="table-responsive">
                    <table class="table table-striped font-12" id="datatable">
                        <thead>
                        <tr>
                            <th>Cód</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th class="col-lg-1">Ativo</th>
                            <th class="col-lg-3"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @if($user->ativo == '1')
                                        <label class="label label-success">Sim</label>
                                    @else
                                        <label class="label label-danger">Não</label>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('admin.user.edit', [$user->id])}}"
                                       class="btn btn-info btn-flat btn-xs">
                                        <i class="glyphicon glyphicon-edit"></i> Editar
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr class="text-center">
                                <td colspan="6"><b>Nenhum Usuário Cadastrado.</b></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
