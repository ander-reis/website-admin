@component('admin.form-components._form_group',['field' => 'ds_icone'])
    {{ Form::label('ds_icone', 'Ícone', ['class' => 'control-label']) }}
    {{ Form::text('ds_icone', null, ['class' => 'form-control', 'maxlength' => 100]) }}
@endcomponent

@component('admin.form-components._form_group',['field' => 'ds_titulo'])
    {{ Form::label('ds_titulo', 'Título', ['class' => 'control-label']) }}
    {{ Form::text('ds_titulo', null, ['class' => 'form-control', 'maxlength' => 30]) }}
@endcomponent

@component('admin.form-components._form_group',['field' => 'ds_link'])
    {{ Form::label('ds_link', 'Link', ['class' => 'control-label']) }}
    {{ Form::text('ds_link', null, ['class' => 'form-control', 'maxlength' => 100]) }}
@endcomponent