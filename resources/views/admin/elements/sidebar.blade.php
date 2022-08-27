<aside class="side-navigation-wrap sidebar-fixed hidden-print">
    <div class="sidenav-inner">
        <ul class="side-nav magic-nav">
            <li class="side-nav-header">
                Menus
            </li>
            <li class="has-submenu">
                <a href="javascript:void(0);" data-toggle="collapse" aria-expanded="false">
                    <i class="icon-stack"></i> <span class="nav-text">Administrativo</span>
                </a>
                <div class="sub-menu secondary list-style-circle" id="submenu">
                    <ul>
                        <li class="has-submenu">
                            <a href="{{ route('admin.banner.create') }}">Banner</a>
                        </li>
                        <li class="has-submenu">
                            <a href="#galerias" data-toggle="collapse" aria-expanded="true">Galeria de Fotos</a>

                            <div class="sub-menu collapse tertiary list-style-dashed" id="galerias">
                                <ul>
                                    <li><a href="{{ route('admin.galeria.create') }}">Nova Galeria</a></li>
                                    <li><a href="{{ route('admin.galeria.index') }}">Listar Galerias</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="has-submenu">
                            <a href="#links" data-toggle="collapse" aria-expanded="true">Links Úteis</a>

                            <div class="sub-menu collapse tertiary list-style-dashed" id="links">
                                <ul>
                                    <li><a href="{{ route('admin.link.create') }}">Novo Link</a></li>
                                    <li><a href="{{ route('admin.link.index') }}">Listar Links</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="has-submenu">
                            <a href="{{ route('admin.midia.create') }}">Mídias</a>
                        </li>
                        <li class="has-submenu">
                            <a href="#noticias" data-toggle="collapse" aria-expanded="true">Notícias</a>

                            <div class="sub-menu collapse tertiary list-style-dashed" id="noticias">
                                <ul>
                                    <li><a href="{{ route('admin.categoria.create') }}">Categorias</a></li>
                                    <li><a href="{{ route('admin.noticia.create') }}">Nova Notícia</a></li>
                                    <li><a href="{{ route('admin.noticia.index') }}">Listar Notícias</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="has-submenu">
                            <a href="#secretarias" data-toggle="collapse" aria-expanded="true">Secretarias</a>

                            <div class="sub-menu collapse tertiary list-style-dashed" id="secretarias">
                                <ul>
                                    <li><a href="{{ route('admin.secretaria.create') }}">Nova Secretaria</a></li>
                                    <li><a href="{{ route('admin.secretaria.index') }}">Listar Secretarias</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="has-submenu">
                            <a href="#secretarios" data-toggle="collapse" aria-expanded="true">Secretários</a>

                            <div class="sub-menu collapse tertiary list-style-dashed" id="secretarios">
                                <ul>
                                    <li><a href="{{ route('admin.secretario.create') }}">Novo Secretário</a></li>
                                    <li><a href="{{ route('admin.secretario.index') }}">Listar Secretários</a></li>
                                    <li><a href="{{ route('admin.cargo.create') }}">Cargos</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="has-submenu">
                            <a href="#publicacao" data-toggle="collapse" aria-expanded="true">Publicação</a>

                            <div class="sub-menu collapse tertiary list-style-dashed" id="publicacao">
                                <ul>
                                    <li><a href="{{ route('admin.publicacao.create') }}">Nova Publicação</a></li>
                                    <li><a href="{{ route('admin.publicacao.index') }}">Listar Publicações</a></li>
                                    <li><a href="{{ route('admin.tipo.create') }}">Tipos de Publicações</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="has-submenu">
                            <a href="#usuarios" data-toggle="collapse" aria-expanded="true">Usuários</a>

                            <div class="sub-menu collapse tertiary list-style-dashed" id="usuarios">
                                <ul>
                                    <li><a href="{{ route('admin.user.create') }}">Novo Usuário</a></li>
                                    <li><a href="{{ route('admin.user.list') }}">Listar Usuários</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="has-submenu">
                <a href="javascript:void(0);" data-toggle="collapse" aria-expanded="false">
                    <i class="glyphicon glyphicon-th-large"></i> <span class="nav-text">Páginas</span>
                </a>
                <div class="sub-menu  secondary list-style-circle" id="submenu10">
                    <ul>
                        <li><a href="{{ route('admin.pagina.create') }}">Criar Página</a></li>
                        <li><a href="{{ route('admin.pagina.showAll') }}">Listar Todas</a></li>
                    </ul>
                </div>
            </li>

            <li class="has-submenu">
                <a href="javascript:void(0);" data-toggle="collapse" aria-expanded="false">
                    <i class="glyphicon glyphicon-cog"></i> <span class="nav-text">Configurações</span>
                </a>
                <div class="sub-menu secondary list-style-circle" id="configuracao">
                    <ul>
                        <li><a href="{{ route('admin.entidade.edit',1) }}">Dados da Entidade</a></li>
                        <li><a href="{{ route('admin.site.edit',1) }}">Página Inicial</a></li>
                    </ul>
                </div>
            </li>

            <li class="first-link">
                <a href="{{route('logout')}}" class="animsition-link">
                    <i class="glyphicon glyphicon-off"></i>
                    <span class="nav-text">Sair</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
