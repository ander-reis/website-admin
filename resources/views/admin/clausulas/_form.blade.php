<div class="form-row mb-3">
    @component('admin.form-components._form_group_inline',['field' => 'num_clausula', 'class' => 'col-md-2'])
        {{ Form::label('num_clausula', 'Número Cláusula', ['class' => 'control-label']) }}
        {{ Form::text('num_clausula', null, ['class' => 'form-control', 'maxlength' => 3]) }}
    @endcomponent

    @component('admin.form-components._form_group_inline', ['field' => 'ds_titulo', 'class' => 'col-md-10'])
        {{ Form::label('ds_titulo', 'Título', ['class' => 'control-label']) }}
        {{ Form::text('ds_titulo', null, ['class' => 'form-control', 'maxlength' => 150]) }}
    @endcomponent
</div>

@component('admin.form-components._form_group',['field' => 'ds_texto'])
    {{ Form::label('ds_texto', 'Texto', ['class' => 'control-label']) }}
    {{ Form::textarea('ds_texto', null, ['class' => 'form-control']) }}
@endcomponent

@component('admin.form-components._form_group',['field' => 'ds_palavra_chave'])
    {{ Form::label('ds_palavra_chave', 'Palavra Chave', ['class' => 'control-label']) }}
    {{ Form::text('ds_palavra_chave', null, ['class' => 'form-control', 'maxlength' => 150]) }}
@endcomponent

@component('admin.form-components._form_group',['field' => 'fl_ativo'])
    {{ Form::label('fl_ativo', 'Status da Cláusula', ['class' => 'control-label']) }}
    <div class="radio{{$errors->has('fl_ativo')?' text-danger':''}}">
        <label>
            {{ Form::radio('fl_ativo', '1', true) }} Ativo
        </label>
    </div>

    <div class="radio{{$errors->has('fl_ativo')?' text-danger':''}}">
        <label>
            {{ Form::radio('fl_ativo', '0', false) }} Oculta
        </label>
    </div>
@endcomponent
