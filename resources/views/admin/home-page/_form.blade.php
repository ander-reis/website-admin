<section class="row">
    <div class="col-12">
        <h3>Destaque 1</h3>
        <hr>
    </div>
    @component('admin.form-components._form_group_inline',['field' => 'ds_categoria', 'class' => 'col-md-6'])
            {{ Form::label('ds_categoria', 'Chapéu', ['class' => 'col-sm-2 col-form-label']) }}
            {{ Form::select('ds_categoria', \App\Models\NoticiasCategoria::pluck('ds_categoria', 'id_categoria'), null, ['placeholder' => 'Selecione a Categoria', 'class' => 'form-control']) }}
    @endcomponent

    @component('admin.form-components._form_group_inline',['field' => 'ds_link', 'class' => 'col-md-6'])
        {{ Form::label('ds_link', 'Link', ['class' => 'col-sm-2 control-label']) }}
        {{ Form::text('ds_link', null, ['class' => 'form-control', 'maxlength' => 80]) }}
    @endcomponent

    <div class="col no-gutters">
        @component('admin.form-components._form_group_inline',['field' => 'ds_titulo', 'class' => 'col-md-12'])
            {{ Form::label('ds_titulo', 'Título', ['class' => 'col-sm-2 col-form-label']) }}
            {{ Form::text('ds_titulo', null, ['class' => 'form-control', 'maxlength' => 80, 'id' => 'teste']) }}
        @endcomponent

        @component('admin.form-components._form_group_inline',['field' => 'ds_texto_noticia', 'class' => 'col-md-12'])
            {{ Form::label('ds_texto_noticia', 'Texto', ['class' => 'col-sm-2 control-label']) }}
            {{ Form::textarea('ds_texto_noticia', null, ['class' => 'form-control', 'rows' => 3]) }}
        @endcomponent
    </div>
</section>
