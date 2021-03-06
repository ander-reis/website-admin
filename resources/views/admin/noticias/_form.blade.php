{{ Form::hidden('redirects_to', URL::previous()) }}

@component('admin.form-components._form_group',['field' => 'id_categoria'])
    {{ Form::label('id_categoria', 'Categoria', ['class' => 'control-label']) }}
    {{ Form::select('id_categoria', \App\Models\NoticiasCategoria::orderBy('ds_categoria')->pluck('ds_categoria', 'id'), null, ['placeholder' => 'Selecione a Categoria', 'class' => 'form-control']) }}
@endcomponent

@component('admin.form-components._form_group',['field' => 'ds_resumo'])
    {{ Form::label('ds_resumo', 'Título', ['class' => 'control-label']) }}
    {{ Form::text('ds_resumo', null, ['class' => 'form-control', 'maxlength' => 80]) }}
@endcomponent

@component('admin.form-components._form_group',['field' => 'ds_texto'])
    {{ Form::label('ds_texto', 'Texto', ['class' => 'control-label']) }}
    {{ Form::textarea('ds_texto', null, ['class' => 'form-control']) }}
@endcomponent

@component('admin.form-components._form_group',['field' => 'ds_palavra_chave'])
    {{ Form::label('ds_palavra_chave', 'Palavra Chave', ['class' => 'control-label']) }}
    {{ Form::text('ds_palavra_chave', null, ['class' => 'form-control', 'maxlength' => 150]) }}
@endcomponent

<div class="row mb-3">
@component('admin.form-components._form_group_inline',['field' => 'dt_noticia', 'class' => 'col-md-6'])
        {{ Form::label('dt_noticia', 'Data da Notícia', ['class' => 'control-label']) }}
        {{ Form::date('dt_noticia', (isset($noticias->dt_cadastro_utc_formatted) ? $noticias->dt_cadastro_utc_formatted : \Carbon\Carbon::now()), ['class' => 'form-control']) }}
@endcomponent

@component('admin.form-components._form_group_inline', ['field' => 'hr_noticia', 'class' => 'col-md-6'])
        {{ Form::label('hr_noticia', 'Horário da Notícia', ['class' => 'control-label']) }}
        {{ Form::time('hr_noticia', (isset($noticias->hr_noticia_formatted) ? $noticias->hr_noticia_formatted : \Carbon\Carbon::now()->format('H:i')), ['class' => 'form-control']) }}
@endcomponent
</div>

@component('admin.form-components._form_group',['field' => 'fl_status'])
    {{ Form::label('fl_status', 'Status da Notícia', ['class' => 'control-label']) }}
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
