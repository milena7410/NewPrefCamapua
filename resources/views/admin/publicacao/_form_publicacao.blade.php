<div class="form-group has-feedback">
    {!! Form::label('nome','Nome *',['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-7">
        {!! Form::text('nome',null,['class' => 'form-control input-transparent','required']) !!}
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="form-group has-feedback">
    {!! Form::label('numero','Numero*',['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-7">
        {!! Form::number('numero',null,['class' => 'form-control input-transparent','required']) !!}
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="form-group has-feedback">
    {!! Form::label('ano','Ano*',['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-7">
        {!! Form::number('ano',null,['class' => 'form-control','required']) !!}
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="form-group has-feedback">
    {!! Form::label('tipo_publicacao_id','Tipo de Publicação',['class' => 'col-sm-2 control-label','required']) !!}
    <div class="col-sm-7">
        {!! Form::select('tipo_publicacao_id',[null => 'SELECIONE UM TIPO DE PUBLICAÇÃO']+$tipos->toArray(),null,['class' => 'form-control','required']) !!}
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="form-group has-feedback">
    {!! Form::label('descricao','Descrição*',['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-7">
        {!! Form::textarea('descricao',null,['class' => 'form-control','required']) !!}
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        <div class="help-block with-errors"></div>
    </div>
</div>


<div class="form-group">
    {!! Form::label('ativo','Ativar Publicação?',['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-7">
        <div class="radio-inline">
            <div class="custom-radio font-12 radio-green">
                {!! Form::radio('ativo','1',true,['id' => 'ativo-yes']) !!}
                <label for="ativo-yes">
                    Sim
                </label>
            </div>
        </div>
        <div class="radio-inline">
            <div class="custom-radio font-12 radio-red">
                {!! Form::radio('ativo','0', false,['id' => 'ativo-no']) !!}
                <label for="ativo-no">
                    Não
                </label>
            </div>
        </div>
    </div>
</div>