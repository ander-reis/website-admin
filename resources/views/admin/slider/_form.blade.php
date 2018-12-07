@component('admin.form-components._form_group', ['field' => 'ds_imagem'])
    {{ Form::label('ds_imagem', 'Upload Imagem', ['class' => 'control-label']) }}
    {{ Form::file('ds_imagem', ['class' => 'form-control-file']) }}
@endcomponent

@component('admin.form-components._form_group', ['field' => 'ds_label'])
    {{ Form::label('ds_label', 'Label', ['class' => 'control-label']) }}
    {{ Form::text('ds_label', null, ['class' => 'form-control', 'maxlength' => 15]) }}
@endcomponent

@component('admin.form-components._form_group', ['field' => 'ds_titulo'])
    {{ Form::label('ds_titulo', 'Título', ['class' => 'control-label']) }}
    {{ Form::text('ds_titulo', null, ['class' => 'form-control', 'maxlength' => 30]) }}
@endcomponent

@component('admin.form-components._form_group', ['field' => 'ds_link'])
    {{ Form::label('ds_link', 'Link', ['class' => 'control-label']) }}
    {{ Form::text('ds_link', null, ['class' => 'form-control', 'maxlength' => 255]) }}
@endcomponent

@component('admin.form-components._form_group',['field' => 'fl_ativo'])
    {{ Form::label('fl_ativo', 'Status do Slide', ['class' => 'control-label']) }}
    <div class="radio{{$errors->has('fl_ativo') ? ' text-danger' : ''}}">
        <label>
            {{ Form::radio('fl_ativo', '1', true) }} Ativo
        </label>
    </div>

    <div class="radio{{$errors->has('fl_ativo') ? ' text-danger' : ''}}">
        <label>
            {{ Form::radio('fl_ativo', '0') }} Oculta
        </label>
    </div>
@endcomponent
