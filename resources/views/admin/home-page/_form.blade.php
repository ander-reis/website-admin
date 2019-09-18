<section>
    <h3>Destaque 1</h3>
    <hr>
    @component('admin.form-components._input_inline',['field' => 'ds_categoria'])
        @slot('label')
            {{ Form::label('ds_categoria', 'Chapéu', ['class' => 'col-sm-2 col-form-label']) }}
        @endslot
        @slot('input')
            {{ Form::select('ds_categoria', \App\Models\NoticiasCategoria::pluck('ds_categoria', 'id_categoria'), null, ['placeholder' => 'Selecione a Categoria', 'class' => 'form-control']) }}
        @endslot
    @endcomponent

    @component('admin.form-components._input_inline',['field' => 'ds_titulo'])
        @slot('label')
            {{ Form::label('ds_titulo', 'Título', ['class' => 'col-sm-2 col-form-label']) }}
        @endslot
        @slot('input')
            {{ Form::text('ds_titulo', null, ['class' => 'form-control', 'maxlength' => 80, 'id' => 'teste']) }}
        @endslot
    @endcomponent

    @component('admin.form-components._input_inline',['field' => 'ds_texto_noticia'])
        @slot('label')
            {{ Form::label('ds_texto_noticia', 'Texto', ['class' => 'col-sm-2 control-label']) }}
        @endslot
        @slot('input')
            {{ Form::text('ds_texto_noticia', null, ['class' => 'form-control', 'maxlength' => 150]) }}
        @endslot
    @endcomponent

    @component('admin.form-components._input_inline',['field' => 'ds_link'])
        @slot('label')
            {{ Form::label('ds_link', 'Link', ['class' => 'col-sm-2 control-label']) }}
        @endslot
        @slot('input')
            {{ Form::text('ds_link', null, ['class' => 'form-control', 'maxlength' => 80]) }}
        @endslot
    @endcomponent
</section>
