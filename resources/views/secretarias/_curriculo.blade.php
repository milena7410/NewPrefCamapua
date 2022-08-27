<div class="modal fade" id="curriculo" tabindex="-1" role="dialog" aria-labelledby="curriculoSecretario">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Currículo - {{$secretaria->secretario->nome}}</h4>
            </div>
            <div class="modal-body">
                {!! $secretaria->secretario->descricao !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>