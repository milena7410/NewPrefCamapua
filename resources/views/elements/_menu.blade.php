<div class="row">
    <nav class="navbar navbar-default menu-topo" style="margin-bottom: 0;">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#menu"
                        aria-expanded="false">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="menu">
                <ul class="nav navbar-nav text-center">
                    <li class="active">
                        <a href="{{route('inicio')}}"
                           class="home">{!! Html::image('img/icon-casa.png', 'Inicio', ['class' => 'img-responsive center-block']) !!}</a>
                    </li>
                    {{--@foreach($menus as $menu)
                        @if($menu->subPaginas()->count() == 0)
                            <li>
                                <a href="{{$menu->url}}" target="{{$menu->getTargetName()}}">
                                    {{$menu->titulo}}
                                </a>
                            </li>
                        @else
                            <li class="dropdown">
                                <a href="{{ $menu->url }}" class="dropdown-toggle" data-toggle="dropdown"
                                   role="button"
                                   aria-haspopup="true" aria-expanded="false">
                                    {{$menu->titulo}} <span class="caret"></span>
                                </a>

                                 <ul class="dropdown-menu">
                                     @foreach($menu->subPaginas() as $pagina)
                                         @if($pagina->isInterno())
                                             <li>
                                                 <a href="{{route('pagina.show',['url' => $pagina->url])}}"
                                                    target="{{$pagina->getTargetName()}}">
                                                     {{$pagina->titulo}}
                                                 </a>
                                             </li>
                                         @else
                                             <li>
                                                 <a href="{{ $pagina->url }}"
                                                    target="{{$pagina->getTargetName()}}">
                                                     {{$pagina->titulo}}
                                                 </a>
                                             </li>
                                         @endif
                                     @endforeach
                                 </ul>
                            </li>
                        @endif
                    @endforeach--}}

                    @foreach($menus as $menu)
                        @if($menu->subPaginas()->count() == 0)
                            <li>
                                <a href="{{$menu->url}}" target="{{$menu->getTargetName()}}">
                                    {{$menu->titulo}}
                                </a>
                            </li>
                        @else

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-haspopup="true" aria-expanded="false">{{$menu->titulo}}
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach($menu->subPaginas() as $subPagina)
                                        @if($subPagina->subPaginas()->count() == 0)
                                            @if($subPagina->isInterno())
                                                <li>
                                                    <a href="{{route('pagina.show',['url' => $subPagina->url])}}"
                                                       target="{{$subPagina->getTargetName()}}">
                                                        {{$subPagina->titulo}}
                                                    </a>
                                                </li>
                                            @else
                                                <li>
                                                    <a href="{{ $subPagina->url }}"
                                                       target="{{$subPagina->getTargetName()}}">
                                                        {{$subPagina->titulo}}
                                                    </a>
                                                </li>
                                            @endif
                                        @else
                                            <li class="dropdown-submenu">
                                                <a tabindex="-1" href="#">{{$subPagina->titulo}}</a>
                                                <ul class="dropdown-menu">
                                                    @foreach($subPagina->subPaginas() as $pagina)
                                                        @if($pagina->isInterno())
                                                            <li>
                                                                <a href="{{route('pagina.show',['url' => $pagina->url])}}"
                                                                   target="{{$pagina->getTargetName()}}">
                                                                    {{$pagina->titulo}} aa
                                                                </a>
                                                            </li>
                                                        @else
                                                            <li>
                                                                <a href="{{ $pagina->url }}"
                                                                   target="{{$pagina->getTargetName()}}">
                                                                    {{$pagina->titulo}}
                                                                </a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    @endforeach

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false">Secretarias <span
                                    class="caret"></span></a>
                        <ul class="dropdown-menu">
                            @foreach($secretarias as $secretaria)
                                <li>
                                    <a href="{{route('secretaria',['url' => $secretaria->url])}}">{{$secretaria->secretaria}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</div>
