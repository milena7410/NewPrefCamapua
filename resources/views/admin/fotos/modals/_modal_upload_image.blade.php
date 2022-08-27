<div class="modal fade model-upload-image" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Inserir Imagem</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'admin.foto.upload', 'method' => 'post','files' => true]) !!}
                    <div class="form-group">
                        {!! Form::file('imagem',['class' => 'form-control input-transparent fileImageProduct','required']) !!}
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                        {!! Form::hidden('principal',0) !!}
                        {!! Form::hidden('galeria_id',null,['id' => 'idProdUpload']) !!}
                    </div>
                    {!! Form::submit('Enviar Imagem',['class' => 'btn btn-main btn-block m-t-30 btn-success']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>