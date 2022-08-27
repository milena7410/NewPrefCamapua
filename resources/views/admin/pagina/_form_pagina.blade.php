<div class="form-group has-feedback">
    {!! Form::label('titulo','Título Página',['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::text('titulo',null,['class' => 'form-control','required']) !!}
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="form-group has-feedback">
    {!! Form::label('url','Url*',['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::text('url',null,['class' => 'form-control']) !!}
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('pagina_interna','Link Interno?',['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-7">
        <div class="radio-inline">
            <div class="custom-radio font-12 radio-green">
                {!! Form::radio('pagina_interna','1',false,['id' => 'interno-yes']) !!}
                <label for="interno-yes">
                    Sim
                </label>
            </div>
        </div>
        <div class="radio-inline">
            <div class="custom-radio font-12 radio-red">
                {!! Form::radio('pagina_interna','0', true,['id' => 'interno-no']) !!}
                <label for="interno-no">
                    Não
                </label>
            </div>
        </div>
    </div>
</div>

<div class="form-group has-feedback">
    {!! Form::label('pagina_id','Menu Principal',['class' => 'col-sm-2 control-label','required']) !!}
    <div class="col-sm-8">
        {!! Form::select('pagina_id',[null => 'SELECIONE UM MENU']+$paginas->toArray(),null,['class' => 'form-control']) !!}
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="form-group has-feedback">
    {!! Form::label('conteudo','Descrição *',['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::textarea('conteudo',null,['class' => 'form-control summernote']) !!}
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
    {!! Form::label('secretaria','Mostrar Somente na Secretaria?',['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-7">
        <div class="radio-inline">
            <div class="custom-radio font-12 radio-green">
                {!! Form::radio('secretaria','1',false,['id' => 'secretaria-yes']) !!}
                <label for="secretaria-yes">
                    Sim
                </label>
            </div>
        </div>
        <div class="radio-inline">
            <div class="custom-radio font-12 radio-red">
                {!! Form::radio('secretaria','0', true,['id' => 'secretaria-no']) !!}
                <label for="secretaria-no">
                    Não
                </label>
            </div>
        </div>
    </div>
</div>


<div class="form-group">
    {!! Form::label('target','Abrir em uma nova guia?',['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-7">
        <div class="radio-inline">
            <div class="custom-radio font-12 radio-green">
                {!! Form::radio('target','1',false,['id' => 'target-yes']) !!}
                <label for="target-yes">
                    Sim
                </label>
            </div>
        </div>
        <div class="radio-inline">
            <div class="custom-radio font-12 radio-red">
                {!! Form::radio('target','0', true,['id' => 'target-no']) !!}
                <label for="target-no">
                    Não
                </label>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('ativo','Ativar Página?',['class' => 'col-sm-2 control-label']) !!}
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