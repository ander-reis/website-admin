{{ Form::hidden('redirects_to', URL::previous()) }}

@component('admin.form-components._form_group',['field' => 'ds_categoria'])
    {{ Form::label('ds_categoria', 'Título', ['class' => 'control-label']) }}
    {{ Form::text('ds_categoria', null, ['class' => 'form-control']) }}
@endcomponent
