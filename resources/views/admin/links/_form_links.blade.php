<div class="form-group has-feedback">
    {!! Form::label('titulo','Título *',['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-7">
        {!! Form::text('titulo',null,['class' => 'form-control input-transparent','required']) !!}
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="form-group has-feedback">
    {!! Form::label('subtitulo','Subtítulo',['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-7">
        {!! Form::text('subtitulo',null,['class' => 'form-control input-transparent']) !!}
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="form-group has-feedback">
    {!! Form::label('tipo','Categoria*',['class' => 'col-sm-2 control-label','required']) !!}
    <div class="col-sm-7">
        {!! Form::select('tipo',[null => 'SELECIONE UMA CATEGORIA','bt' => 'Brasil Transparente','lu' => 'Link Útil',
                                    'osc' => 'Organização da Sociedade Cívil']
                    ,null,['class' => 'form-control','required']) !!}
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="form-group has-feedback">
    {!! Form::label('url','Url*',['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-7">
        {!! Form::text('url',null,['class' => 'form-control','required']) !!}
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="form-group has-feedback">
    {!! Form::label('secretarias','Insira as Secretarias para a Notícia',['class' => 'col-sm-2 control-label','required']) !!}
    <div class="col-sm-7">
        {!! Form::select('secretarias[]',$secretarias,null,['id' => 'secretariasSelect','class' => 'form-control','multiple' => true]) !!}
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('target','Abrir em uma nova guia?',['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-7">
        <div class="radio-inline">
            <div class="custom-radio font-12 radio-green">
                {!! Form::radio('target','1',true,['id' => 'target-yes']) !!}
                <label for="target-yes">
                    Sim
                </label>
            </div>
        </div>
        <div class="radio-inline">
            <div class="custom-radio font-12 radio-red">
                {!! Form::radio('target','0', false,['id' => 'target-no']) !!}
                <label for="target-no">
                    Não
                </label>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('ativo','Ativar Link?',['class' => 'col-sm-2 control-label']) !!}
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