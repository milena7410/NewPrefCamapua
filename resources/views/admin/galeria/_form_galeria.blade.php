<div class="form-group has-feedback">
    {!! Form::label('titulo','Título *',['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-7">
        {!! Form::text('titulo',null,['class' => 'form-control input-transparent','required']) !!}
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="form-group has-feedback">
    {!! Form::label('data_galeria','Data Galeria*',['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-7">
        {!! Form::text('data_galeria',null,['class' => 'form-control datepicker','required','dd/mm/aaaa','readonly' =>'readonly']) !!}
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

<div class="form-group has-feedback">
    {!! Form::label('secretarias','Insira as Secretarias para a Notícia',['class' => 'col-sm-2 control-label','required']) !!}
    <div class="col-sm-7">
        {!! Form::select('secretarias[]',$secretarias,null,['id' => 'secretariasSelect','class' => 'form-control','multiple' => true]) !!}
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

        <div class="help-block with-errors"></div>
    </div>
</div>


<div class="form-group">
    {!! Form::label('ativo','Ativar Galeria?',['class' => 'col-sm-2 control-label']) !!}
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