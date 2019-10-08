<div class="my-3">
    <h1>Editar {{ $model->txt_titulo }}</h1>
</div>

@component('admin.form-components._form_group',['field' => 'txt_titulo'])
    {{ Form::label('txt_titulo', 'Título', ['class' => 'control-label']) }}
    {{ Form::text('txt_titulo', null, ['class' => 'form-control', 'maxlength' => 75]) }}
@endcomponent

@component('admin.form-components._form_group',['field' => 'txt_titulo_busca'])
    {{ Form::label('txt_titulo_busca', 'Título da Busca', ['class' => 'control-label']) }}
    {{ Form::text('txt_titulo_busca', null, ['class' => 'form-control', 'maxlength' => 75]) }}
@endcomponent

@component('admin.form-components._form_group',['field' => 'ds_texto'])
    {{ Form::label('ds_texto', 'Texto', ['class' => 'control-label']) }}
    {{ Form::textarea('ds_texto', null, ['class' => 'form-control']) }}
@endcomponent

@component('admin.form-components._form_group',['field' => 'url'])
    {{ Form::label('url', 'Endereço da Página', ['class' => 'control-label']) }}
    {{ Form::text('url', null, ['class' => 'form-control', 'maxlength' => 100]) }}
@endcomponent

@component('admin.form-components._form_group',['field' => 'ds_palavra_chave'])
    {{ Form::label('ds_palavra_chave', 'Título da Busca', ['class' => 'control-label']) }}
    {{ Form::text('ds_palavra_chave', null, ['class' => 'form-control', 'maxlength' => 150]) }}
@endcomponent

@component('admin.form-components._form_group',['field' => 'fl_status'])
    {{ Form::label('fl_status', 'Status da Página', ['class' => 'control-label']) }}
    <div class="radio{{$errors->has('fl_status') ? ' text-danger' : ''}}">
        <div class="custom-control custom-radio custom-control-inline">
            {{ Form::radio('fl_status', '1', true, ['class' => 'custom-control-input', 'id' => 'fl_status_ativo']) }}
            {{ Form::label('fl_status_ativo', 'Ativo', ['class' => 'custom-control-label']) }}
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            {{ Form::radio('fl_status', '0', false, ['class' => 'custom-control-input', 'id' => 'fl_status']) }}
            {{ Form::label('fl_status', 'Oculto', ['class' => 'custom-control-label']) }}
        </div>
    </div>
@endcomponent
