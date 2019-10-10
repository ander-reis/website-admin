{{ Form::hidden('redirects_to', URL::previous()) }}

<div class="row mb-3">
    @component('admin.form-components._form_group_inline',['field' => 'id_boletim', 'class' => 'col-md-6'])
        {{ Form::label('id_boletim', 'ID Boletim', ['class' => 'control-label']) }}
        {{ Form::number('id_boletim', null, ['class' => 'form-control']) }}
    @endcomponent

    @component('admin.form-components._form_group_inline',['field' => 'dt_boletim', 'class' => 'col-md-6'])
        {{ Form::label('dt_boletim', 'Data do Boletim', ['class' => 'control-label']) }}
        {{ Form::date('dt_boletim', (isset($model->dt_boletim) ? $model->dt_boletim_utc_formatted : \Carbon\Carbon::now()), ['class' => 'form-control']) }}
    @endcomponent
</div>

@component('admin.form-components._form_group',['field' => 'ds_destaque'])
    {{ Form::label('ds_destaque', 'Destaque', ['class' => 'control-label']) }}
    {{ Form::text('ds_destaque', null, ['class' => 'form-control', 'maxlength' => 100]) }}
@endcomponent

@component('admin.form-components._form_group',['field' => 'ds_link'])
    {{ Form::label('ds_link', 'Link', ['class' => 'control-label']) }}
    {{ Form::text('ds_link', null, ['class' => 'form-control', 'maxlength' => 100]) }}
@endcomponent

@component('admin.form-components._form_group',['field' => 'ds_tag'])
    {{ Form::label('ds_tag', 'Descrição da Tag', ['class' => 'control-label']) }}
    {{ Form::text('ds_tag', null, ['class' => 'form-control', 'maxlength' => 100]) }}
@endcomponent
