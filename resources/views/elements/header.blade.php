<header><meta charset="euc-jp">
    <div class="container-fluid">
        <div class="row topbar">
            <div class="col-md-12">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 margin-top-10">
                            <h5>Camapuã/MS, {{ Date::now()->format('j \d\e F \d\e Y')  }}</h5>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-inline contato-topo text-right">
                                <li>{!! Html::image('/img/fale-conosco-white.png', 'email', ['class' => 'img-responsive']) !!}</li>
                                <li><a class="link-unstyled-white-hover" href="http://webmail.camapua.ms.gov.br/" target="_blank">Webmail</a></li>
                                <li>{!! Html::image('/img/telefone.png', 'telefone', ['class' => 'img-responsive']) !!}</li>
                                <li>{{$entidade->telefone}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="width:104%; background-image: url('img/slider/banner_bg_top.jpeg'); background-image:cover; background-size: 100%; background-position: center; padding-right:10px;">
            <div class="container-fluid topo-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="center-block container-logo">
                                {!! Html::image('img/logo.png', 'C���mara de Camapuâ', ['class' => 'img-responsive']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('elements._menu')
    </div>
</header>
