<div class="form-group has-feedback">
    <label for="image" class="col-sm-2 control-label">
        Arquivo*
        <span class="help-block"></span>
    </label>
    <div class="col-sm-7">
        {!! Form::file('file',['class' => 'form-control input-transparent','required']) !!}
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    </div>
</div>

<div class="form-group has-feedback">
    {!! Form::label('descricao','Descrição *',['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-7">
        {!! Form::text('descricao',null,['class' => 'form-control','required']) !!}
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('ativo','Ativar Mídia?',['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-7">
        <div class="radio-inline">
            <div class="custom-radio font-12 radio-green">
                {!! Form::radio('ativo','1',true,['id' => 'active-yes']) !!}
                <label for="active-yes">
                    Sim
                </label>
            </div>
        </div>
        <div class="radio-inline">
            <div class="custom-radio font-12 radio-red">
                {!! Form::radio('ativo','0', false,['id' => 'active-no']) !!}
                <label for="active-no">
                    Não
                </label>
            </div>
        </div>
    </div>
</div>
