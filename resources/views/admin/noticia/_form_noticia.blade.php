<div class="form-group has-feedback">
    {!! Form::label('titulo','Título *',['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-7">
        {!! Form::text('titulo',null,['class' => 'form-control input-transparent','required','minlength' => 15]) !!}
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="form-group has-feedback">
    {!! Form::label('data_publicacao','Data Publicação*',['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-7">
        {!! Form::text('data_publicacao',null,['class' => 'form-control datepicker','required','dd/mm/aaaa','readonly' =>'readonly']) !!}
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="form-group has-feedback">
    {!! Form::label('hora_publicacao','Hora Publicação*',['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-7">
        {!! Form::time('hora_publicacao',null,['class' => 'form-control timepicker','required','step'=> 1]) !!}
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="form-group has-feedback">
    {!! Form::label('categoria_id','Categoria',['class' => 'col-sm-2 control-label','required']) !!}
    <div class="col-sm-7">
        {!! Form::select('categoria_id',[null => 'SELECIONE UMA CATEGORIA']+$categorias->toArray(),null,['class' => 'form-control','required']) !!}
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

<div class="form-group has-feedback">
    {!! Form::label('galeria_id','Galeria',['class' => 'col-sm-2 control-label','required']) !!}
    <div class="col-sm-7">
        {!! Form::select('galeria_id',[null => 'SELECIONE UMA GALERIA']+$galerias->toArray(),null,
                ['class' => 'form-control']) !!}
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="form-group has-feedback">
    {!! Form::label('descricao','Breve Descrição *',['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-7">
        {!! Form::textarea('descricao',null,['class' => 'form-control input-transparent','required','rows' => 3,'maxlength' => 255]) !!}
        <span class="help-block">Atenção: Informe uma breve descrição com até 255 caracteres.</span>
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="form-group has-feedback">
    {!! Form::label('conteudo','Descrição *',['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-7">
        {!! Form::textarea('conteudo',null,['class' => 'form-control summernote']) !!}
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="form-group">
    <label for="tags" class="col-sm-2 control-label">
        Palavras-Chave
        <span class="help-block">Separados por vírgula</span>
    </label>
    <div class="col-sm-7">
        {!! Form::text('tags',null,['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('destaque','Destacar Notícia?',['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-7">
        <div class="radio-inline">
            <div class="custom-radio font-12 radio-green">
                {!! Form::radio('destaque','1',true,['id' => 'destaque-yes']) !!}
                <label for="destaque-yes">
                    Sim
                </label>
            </div>
        </div>
        <div class="radio-inline">
            <div class="custom-radio font-12 radio-red">
                {!! Form::radio('destaque','0', false,['id' => 'destaque-no']) !!}
                <label for="destaque-no">
                    Não
                </label>
            </div>
        </div>
    </div>
</div>


<div class="form-group">
    {!! Form::label('ativo','Ativar Notícia?',['class' => 'col-sm-2 control-label']) !!}
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