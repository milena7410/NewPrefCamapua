
<div class="form-group has-feedback">
    <label for="image" class="col-sm-2 control-label">
        Slider*
        <span class="help-block">Resolução: 1140x350</span>
    </label>

    <div class="col-sm-7">
        {!! Form::file('slider',['class' => 'form-control','required','accept' => 'image/*']) !!}
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="form-group has-feedback">
    {!! Form::label('url','Link(url)',['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-7">
        {!! Form::text('link',null,['class' => 'form-control']) !!}
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        <div class="help-block with-errors"></div>
    </div>
</div>


<div class="form-group has-feedback">
    {!! Form::label('descricao','Descricao',['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-7">
        {!! Form::text('descricao',null,['class' => 'form-control']) !!}
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('ativo','Ativar Slider?',['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-7">
        <div class="radio-inline">
            <div class="custom-radio font-12 radio-green">
                {!! Form::radio('ativo',1,true,['id' => 'active-yes']) !!}
                <label for="active-yes">
                    Sim
                </label>
            </div>
        </div>
        <div class="radio-inline">
            <div class="custom-radio font-12 radio-red">
                {!! Form::radio('ativo',0, false,['id' => 'active-no']) !!}
                <label for="active-no">
                    Não
                </label>
            </div>
        </div>
    </div>
</div>
