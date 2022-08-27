<div class="modal fade model-recuperar-senha" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                <h4 class="modal-title">Esqueceu sua senha?</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="/solicitar-nova-senha.html" class="sky-form">
                    {!! csrf_field() !!}
                    <div class="form-group form-input-group m-t-30 m-b-5">
                        <input type="text" class="form-control input-lg font-14" value="{{ old('email')}}"
                               required name="email"  placeholder="Informe seu E-mail">
                    </div>
                    <button class="btn btn-success btn-lg btn-block font-14 m-t-30" type="submit">Solicitar</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>