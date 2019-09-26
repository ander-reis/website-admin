@component('admin.form-components._form_group', ['field' => 'ds_imagem_desktop'])
    <p>Imagem Desktop</p>
    <div class="custom-file form-group">
        {{ Form::file('ds_imagem_desktop', ['class' => 'custom-file-input', 'lang' => 'br']) }}
        {{ Form::label('ds_imagem_desktop', 'Upload Imagem Desktop', ['class' => 'custom-file-label control-label']) }}
    </div>
@endcomponent

@component('admin.form-components._form_group', ['field' => 'ds_imagem_mobile'])
    <p>Imagem Mobile</p>
    <div class="custom-file form-group">
        {{ Form::file('ds_imagem_mobile', ['class' => 'custom-file-input', 'lang' => 'br']) }}
        {{ Form::label('ds_imagem_Mobile', 'Upload Imagem Mobile', ['class' => 'custom-file-label control-label']) }}
    </div>
@endcomponent

@component('admin.form-components._form_group', ['field' => 'ds_titulo'])
    {{ Form::label('ds_titulo', 'Título', ['class' => 'control-label']) }}
    {{ Form::text('ds_titulo', null, ['class' => 'form-control', 'maxlength' => 50]) }}
@endcomponent

@component('admin.form-components._form_group', ['field' => 'ds_link'])
    {{ Form::label('ds_link', 'Link', ['class' => 'control-label']) }}
    {{ Form::text('ds_link', null, ['class' => 'form-control', 'maxlength' => 60]) }}
@endcomponent

@component('admin.form-components._form_group', ['field' => 'ds_de'])
    {{ Form::label('dt_de', 'De', ['class' => 'control-label']) }}
    {{ Form::text('dt_de',null , ['class' => 'form-control']) }}
    {{-- <input type="datetime-local" name="bdaytime"> --}}
@endcomponent

@component('admin.form-components._form_group', ['field' => 'ds_ate'])
    {{ Form::label('dt_ate', 'Até', ['class' => 'control-label']) }}
    {{ Form::text('dt_ate', null, ['class' => 'form-control']) }}
@endcomponent
