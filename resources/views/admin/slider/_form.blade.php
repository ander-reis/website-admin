@component('admin.form-components._form_group', ['field' => 'ds_imagem'])
    <p>Upload</p>
    <div class="custom-file form-group">
        {{ Form::file('ds_imagem', ['class' => 'custom-file-input', 'lang' => 'br', 'id' => 'ds_imagem']) }}
        {{ Form::label('ds_imagem', 'Upload Imagem', ['class' => 'custom-file-label control-label']) }}
    </div>
@endcomponent

@component('admin.form-components._form_group', ['field' => 'ds_label'])
    {{ Form::label('ds_label', 'Chapéu', ['class' => 'control-label']) }}
    {{ Form::text('ds_label', null, ['class' => 'form-control', 'maxlength' => 30]) }}
@endcomponent

@component('admin.form-components._form_group', ['field' => 'ds_titulo'])
    {{ Form::label('ds_titulo', 'Título', ['class' => 'control-label']) }}
    {{ Form::text('ds_titulo', null, ['class' => 'form-control', 'maxlength' => 70]) }}
@endcomponent

@component('admin.form-components._form_group', ['field' => 'ds_link'])
    {{ Form::label('ds_link', 'Link', ['class' => 'control-label']) }}
    {{ Form::text('ds_link', null, ['class' => 'form-control', 'maxlength' => 60]) }}
@endcomponent

@component('admin.form-components._form_group',['field' => 'fl_ativo'])
    {{ Form::label('fl_ativo', 'Status do Slide', ['class' => 'control-label']) }}
    <div class="radio{{$errors->has('fl_ativo') ? ' text-danger' : ''}}">
        <div class="custom-control custom-radio custom-control-inline">
            {{ Form::radio('fl_ativo', '1', true, ['class' => 'custom-control-input', 'id' => 'fl_ativo']) }}
            {{ Form::label('fl_ativo', 'Ativo', ['class' => 'custom-control-label']) }}
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            {{ Form::radio('fl_ativo', '0', false, ['class' => 'custom-control-input', 'id' => 'fl_oculto']) }}
            {{ Form::label('fl_oculto', 'Oculto', ['class' => 'custom-control-label']) }}
        </div>
    </div>
@endcomponent
