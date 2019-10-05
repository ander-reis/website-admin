{{ Form::hidden('redirects_to', URL::previous()) }}

@component('admin.form-components._form_group',['field' => 'fl_entidade'])
    {{ Form::label('fl_entidade', 'Entidade', ['class' => 'control-label']) }}
    {{ Form::select('fl_entidade', \App\Models\ConvencoesEntidade::pluck('ds_entidade', 'id'), null, ['placeholder' => 'Selecione a Entidade', 'class' => 'form-control']) }}
@endcomponent

@component('admin.form-components._form_group',['field' => 'ds_titulo'])
    {{ Form::label('ds_titulo', 'Título', ['class' => 'control-label']) }}
    {{ Form::text('ds_titulo', null, ['class' => 'form-control', 'maxlength' => 100]) }}
@endcomponent

@component('admin.form-components._form_group', ['field' => 'url_arquivo'])
    <p>Upload</p>
    <div class="custom-file form-group">
        {{ Form::file('url_arquivo', ['class' => 'custom-file-input', 'lang' => 'br']) }}
        {{ Form::label('url_arquivo', 'Upload Convenção Coletiva', ['class' => 'custom-file-label control-label']) }}
    </div>
@endcomponent

@if(isset($model->url_arquivo))
    @component('admin.components._download_pdf')
        {{ $model->convencao_asset }}
    @endcomponent
@endif

@component('admin.form-components._form_group',['field' => 'ds_titulo_aditamento'])
    {{ Form::label('ds_titulo_aditamento', 'Título Aditamento', ['class' => 'control-label']) }}
    {{ Form::text('ds_titulo_aditamento', null, ['class' => 'form-control', 'maxlength' => 100]) }}
@endcomponent

@component('admin.form-components._form_group', ['field' => 'url_aditamento'])
    <p>Upload Aditamento</p>
    <div class="custom-file">
        {{ Form::file('url_aditamento', ['class' => 'custom-file-input', 'lang' => 'br']) }}
        {{ Form::label('url_arquivo', 'Upload Arquivo Aditamento', ['class' => 'custom-file-label']) }}
    </div>
@endcomponent

@if(isset($model->url_aditamento))
    @if(!$model->url_aditamento == '')
        @component('admin.components._download_pdf')
            {{ $model->aditamento_asset }}
        @endcomponent
    @endif
@endif

@component('admin.form-components._form_group',['field' => 'dt_validade'])
    {{ Form::label('dt_validade', 'Ano de Validade', ['class' => 'control-label']) }}
    {{ Form::text('dt_validade', null, ['class' => 'form-control', 'maxlength' => 9]) }}
@endcomponent

@component('admin.form-components._form_group',['field' => 'fl_app'])
    {{ Form::label('fl_app', 'Ativo no Aplicativo', ['class' => 'control-label']) }}
    <div class="radio{{$errors->has('fl_app') ? ' text-danger' : ''}}">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="fl_ativo_app" name="fl_app" class="custom-control-input" value="1" @isset($model->fl_app) @if($model->fl_app ==  1) checked="checked" @endif @endisset checked="checked">
            <label class="custom-control-label" for="fl_ativo_app">Ativo</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="fl_oculto_app" name="fl_app" class="custom-control-input" value="0" @isset($model->fl_app) @if($model->fl_app ==  0) checked="checked" @endif @endisset>
            <label class="custom-control-label" for="fl_oculto_app">Oculto</label>
        </div>
    </div>
@endcomponent

@component('admin.form-components._form_group',['field' => 'fl_status'])
    {{ Form::label('fl_status', 'Status da Conveção', ['class' => 'control-label']) }}
    <div class="radio{{$errors->has('fl_status') ? ' text-danger' : ''}}">
        <div class="custom-control custom-radio custom-control-inline">
            {{ Form::radio('fl_status', 1, true, ['class' => 'custom-control-input', 'id' => 'fl_status_ativo']) }}
            {{ Form::label('fl_status_ativo', 'Ativo', ['class' => 'custom-control-label']) }}
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            {{ Form::radio('fl_status', 0, false, ['class' => 'custom-control-input', 'id' => 'fl_status']) }}
            {{ Form::label('fl_status', 'Oculto', ['class' => 'custom-control-label']) }}
        </div>
    </div>
@endcomponent
