<footer class="footer">
    <div class="container">
        <div class="row margin-top-30">
            <div class="col-md-4 margin-bottom-30">
                <h4 class="title-contato onde-estamos text-uppercase">Onde Estamos</h4>
                <div class="block-footer margin-top-20">
                    <p>{{$entidade->rua}}, {{ $entidade->numero }}</p>
                    <p>{{ $entidade->bairro }} - CEP: {{ $entidade->cep }}</p>
                    <p>{{ $entidade->cidade }} - {{ $entidade->estado }}</p>
                </div>
                <h4 class="title-contato text-uppercase">Contato</h4>
                <div class="block-footer margin-top-20">
                    <p>{{ $entidade->email }}</p>
                    <br>
                    <p>{{ $entidade->telefone }}</p>
                </div>
            </div>
            <div class="col-md-4 margin-bottom-30">
                <div class="container-title-center">
                    {!! Html::image('img/fale-conosco.png', 'Fale Conosco') !!}
                    <h4 class="text-uppercase">Fale Conosco</h4>
                </div>
                {!! Form::open(['route' => 'pagina.contatar','class' => 'form-footer margin-top-30']) !!}
                {{ method_field('post') }}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 margin-top-10">
                                <input type="text" name="nome" class="form-control col-md-6"
                                       placeholder="Nome Completo">
                            </div>
                            <div class="col-md-6 margin-top-10">
                                <input type="email" name="email" class="form-control col-md-6" placeholder="E-mail">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 margin-top-10">
                                <input type="text" name="assunto" class="form-control col-md-6"
                                       placeholder="Assunto">
                            </div>
                            <div class="col-md-6 margin-top-10">
                                <input type="tel" name="telefone" class="form-control col-md-6"
                                       placeholder="Telefone">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="mensagem" rows="3" placeholder="Mensagem"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-6">
                            <button class="btn btn-footer">ENVIAR MENSAGEM</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
            <div class="col-md-4 margin-bottom-30">
                <div class="embed-responsive embed-responsive-16by9" style="height: 300px;">

                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d940.0437375360104!2d-54.04170227938391!3d-19.53410115678515!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9483d92b3fe932b5%3A0xbd4d76eee69f1118!2sPrefeitura+Mun+de+Camapua!5e0!3m2!1spt-BR!2sbr!4v1519090587497"
                            width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid copyright">
        <div class="row">
            <div class="col-md-12 margin-top-10 text-center">
                <p class="reset-margin"> Copyright {{ \Carbon\Carbon::now()->format('Y') }} - Todos os direitos
                    reservados - Software
                    mantido
                    por: <a href="#" class="developer">Digitar</a></p>
            </div>
        </div>
    </div>
</footer>