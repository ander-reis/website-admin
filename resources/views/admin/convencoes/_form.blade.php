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
    {{ Form::label('url_arquivo', 'Upload Convenção Coletiva', ['class' => 'control-label']) }}
    {{ Form::file('url_arquivo', ['class' => 'form-control-file']) }}
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
    {{ Form::label('url_aditamento', 'Upload Arquivo Aditamento', ['class' => 'control-label']) }}
    {{ Form::file('url_aditamento', ['class' => 'form-control-file']) }}
@endcomponent

@if(isset($model->url_aditamento))
    @component('admin.components._download_pdf')
        {{ $model->aditamento_asset }}
    @endcomponent
@endif

@component('admin.form-components._form_group',['field' => 'dt_validade'])
    {{ Form::label('dt_validade', 'Ano de Validade', ['class' => 'control-label']) }}
    {{ Form::text('dt_validade', null, ['class' => 'form-control', 'maxlength' => 9]) }}
@endcomponent

@component('admin.form-components._form_group',['field' => 'fl_app'])
    {{ Form::label('fl_app', 'Ativo no Aplicativo', ['class' => 'control-label']) }}
    <div class="radio{{$errors->has('fl_app') ? ' text-danger' : ''}}">
        <label>
            {{ Form::radio('fl_app', 1, true) }} Ativo
        </label>
    </div>

    <div class="radio{{$errors->has('fl_app') ? ' text-danger' : ''}}">
        <label>
            {{ Form::radio('fl_app', 0) }} Oculta
        </label>
    </div>
@endcomponent

@component('admin.form-components._form_group',['field' => 'fl_ativo'])
    {{ Form::label('fl_ativo', 'Status da Convenção', ['class' => 'control-label']) }}
    <div class="radio{{$errors->has('fl_ativo') ? ' text-danger' : ''}}">
        <label>
            {{ Form::radio('fl_ativo', 'S', true) }} Ativo
        </label>
    </div>

    <div class="radio{{$errors->has('fl_ativo') ? ' text-danger' : ''}}">
        <label>
            {{ Form::radio('fl_ativo', 'N') }} Oculta
        </label>
    </div>
@endcomponent
