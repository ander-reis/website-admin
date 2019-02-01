{{ Form::hidden('redirects_to', URL::previous()) }}

@component('admin.form-components._form_group',['field' => 'tp_busca'])
    {{ Form::label('tp_busca', 'Tipo de Busca', ['class' => 'control-label']) }}
    {{ Form::select('tp_busca', [1 => 'Sinpro-SP', 2 => 'Serviços', 3 => 'Convenções', 4 => 'Guia de Consultas'], null, ['placeholder' => 'Selecione o Tipo de Busca', 'class' => 'form-control']) }}
@endcomponent

@component('admin.form-components._form_group',['field' => 'txt_titulo_busca'])
    {{ Form::label('txt_titulo_busca', 'Título da Busca', ['class' => 'control-label']) }}
    {{ Form::text('txt_titulo_busca', null, ['class' => 'form-control', 'maxlength' => 75]) }}
@endcomponent

@component('admin.form-components._form_group',['field' => 'txt_titulo'])
    {{ Form::label('txt_titulo', 'Título da Página', ['class' => 'control-label']) }}
    {{ Form::text('txt_titulo', null, ['class' => 'form-control', 'maxlength' => 75]) }}
@endcomponent

@component('admin.form-components._form_group',['field' => 'txt_pagina'])
    {{ Form::label('txt_pagina', 'Texto', ['class' => 'control-label']) }}
    {{ Form::textarea('txt_pagina', null, ['class' => 'form-control']) }}
@endcomponent

@component('admin.form-components._form_group',['field' => 'ds_palavra_chave'])
    {{ Form::label('ds_palavra_chave', 'Palavra Chave', ['class' => 'control-label']) }}
    {{ Form::text('ds_palavra_chave', null, ['class' => 'form-control', 'maxlength' => 150]) }}
@endcomponent

@component('admin.form-components._form_group', ['field' => 'fl_status'])
    {{ Form::label('fl_status', 'Status da Página', ['class' => 'control-label']) }}
    <div class="radio{{$errors->has('fl_status')?' text-danger':''}}">
        <label>
            {{ Form::radio('fl_status', 1, true) }} Ativo
        </label>
    </div>

    <div class="radio{{$errors->has('fl_status')?' text-danger':''}}">
        <label>
            {{ Form::radio('fl_status', 0) }} Oculta
        </label>
    </div>
@endcomponent
