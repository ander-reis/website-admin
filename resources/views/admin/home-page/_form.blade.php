@component('admin.form-components._form_group_validation')
    @slot('title')
        Destaque 1
    @endslot
    @slot('block_one')
        {{ Form::label('ds_categoria', 'Chapéu', ['class' => 'col-sm-2 col-label']) }}
        {{ Form::select('ds_categoria[]', \App\Models\NoticiasCategoria::pluck('ds_categoria', 'ds_categoria'), $data[0]['ds_categoria'], ['placeholder' => 'Selecione a Categoria', 'class' => 'form-control']) }}
    @endslot
    @slot('block_two')
        {{ Form::label('ds_link', 'Link', ['class' => 'col-sm-2 control-label']) }}
        {{ Form::text('ds_link[]', $data[0]['ds_link'], ['class' => 'form-control', 'maxlength' => 80]) }}
    @endslot
    @slot('block_three')
        {{ Form::label('ds_titulo', 'Título', ['class' => 'col-sm-2 col-label']) }}
        {{ Form::text('ds_titulo[]', $data[0]['ds_titulo'], ['class' => 'form-control', 'maxlength' => 80]) }}
    @endslot
    @slot('block_four')
        {{ Form::label('ds_texto_noticia', 'Texto', ['class' => 'col-sm-2 control-label']) }}
        {{ Form::textarea('ds_texto_noticia[]', $data[0]['ds_texto_noticia'], ['class' => 'form-control', 'rows' => 3]) }}
    @endslot
@endcomponent

@component('admin.form-components._form_group_validation')
    @slot('title')
        Destaque 2
    @endslot
    @slot('block_one')
        {{ Form::label('ds_categoria', 'Chapéu', ['class' => 'col-sm-2 col-label']) }}
        {{ Form::select('ds_categoria[]', \App\Models\NoticiasCategoria::pluck('ds_categoria', 'ds_categoria'), $data[1]['ds_categoria'], ['placeholder' => 'Selecione a Categoria', 'class' => 'form-control']) }}
    @endslot
    @slot('block_two')
        {{ Form::label('ds_link', 'Link', ['class' => 'col-sm-2 control-label']) }}
        {{ Form::text('ds_link[]', $data[1]['ds_link'], ['class' => 'form-control', 'maxlength' => 80]) }}
    @endslot
    @slot('block_three')
        {{ Form::label('ds_titulo', 'Título', ['class' => 'col-sm-2 col-label']) }}
        {{ Form::text('ds_titulo[]', $data[1]['ds_titulo'], ['class' => 'form-control', 'maxlength' => 80]) }}
    @endslot
    @slot('block_four')
        {{ Form::label('ds_texto_noticia', 'Texto', ['class' => 'col-sm-2 control-label']) }}
        {{ Form::textarea('ds_texto_noticia[]', $data[1]['ds_texto_noticia'], ['class' => 'form-control', 'rows' => 3]) }}
    @endslot
@endcomponent

@component('admin.form-components._form_group_validation')
    @slot('title')
        Destaque 3
    @endslot
    @slot('block_one')
        {{ Form::label('ds_categoria', 'Chapéu', ['class' => 'col-sm-2 col-label']) }}
        {{ Form::select('ds_categoria[]', \App\Models\NoticiasCategoria::pluck('ds_categoria', 'ds_categoria'), $data[2]['ds_categoria'], ['placeholder' => 'Selecione a Categoria', 'class' => 'form-control']) }}
    @endslot
    @slot('block_two')
        {{ Form::label('ds_link', 'Link', ['class' => 'col-sm-2 control-label']) }}
        {{ Form::text('ds_link[]', $data[2]['ds_link'], ['class' => 'form-control', 'maxlength' => 80]) }}
    @endslot
    @slot('block_three')
        {{ Form::label('ds_titulo', 'Título', ['class' => 'col-sm-2 col-label']) }}
        {{ Form::text('ds_titulo[]', $data[2]['ds_titulo'], ['class' => 'form-control', 'maxlength' => 80]) }}
    @endslot
    @slot('block_four')
        {{ Form::label('ds_texto_noticia', 'Texto', ['class' => 'col-sm-2 control-label']) }}
        {{ Form::textarea('ds_texto_noticia[]', $data[2]['ds_texto_noticia'], ['class' => 'form-control', 'rows' => 3]) }}
    @endslot
@endcomponent

@component('admin.form-components._form_group_validation')
    @slot('title')
        Notícia 1
    @endslot
    @slot('block_one')
        {{ Form::label('ds_categoria', 'Chapéu', ['class' => 'col-sm-2 col-label']) }}
        {{ Form::select('ds_categoria[]', \App\Models\NoticiasCategoria::pluck('ds_categoria', 'ds_categoria'), $data[3]['ds_categoria'], ['placeholder' => 'Selecione a Categoria', 'class' => 'form-control']) }}
    @endslot
    @slot('block_two')
        {{ Form::label('ds_link', 'Link', ['class' => 'col-sm-2 control-label']) }}
        {{ Form::text('ds_link[]', $data[3]['ds_link'], ['class' => 'form-control', 'maxlength' => 80]) }}
    @endslot
    @slot('block_three')
        {{ Form::label('ds_titulo', 'Título', ['class' => 'col-sm-2 col-label']) }}
        {{ Form::text('ds_titulo[]', $data[3]['ds_titulo'], ['class' => 'form-control', 'maxlength' => 80]) }}
    @endslot
@endcomponent

@component('admin.form-components._form_group_validation')
    @slot('title')
        Notícia 2
    @endslot
    @slot('block_one')
        {{ Form::label('ds_categoria', 'Chapéu', ['class' => 'col-sm-2 col-label']) }}
        {{ Form::select('ds_categoria[]', \App\Models\NoticiasCategoria::pluck('ds_categoria', 'ds_categoria'), $data[4]['ds_categoria'], ['placeholder' => 'Selecione a Categoria', 'class' => 'form-control']) }}
    @endslot
    @slot('block_two')
        {{ Form::label('ds_link', 'Link', ['class' => 'col-sm-2 control-label']) }}
        {{ Form::text('ds_link[]', $data[4]['ds_link'], ['class' => 'form-control', 'maxlength' => 80]) }}
    @endslot
    @slot('block_three')
        {{ Form::label('ds_titulo', 'Título', ['class' => 'col-sm-2 col-label']) }}
        {{ Form::text('ds_titulo[]', $data[4]['ds_titulo'], ['class' => 'form-control', 'maxlength' => 80]) }}
    @endslot
@endcomponent

@component('admin.form-components._form_group_validation')
    @slot('title')
        Notícia 3
    @endslot
    @slot('block_one')
        {{ Form::label('ds_categoria', 'Chapéu', ['class' => 'col-sm-2 col-label']) }}
        {{ Form::select('ds_categoria[]', \App\Models\NoticiasCategoria::pluck('ds_categoria', 'ds_categoria'), $data[5]['ds_categoria'], ['placeholder' => 'Selecione a Categoria', 'class' => 'form-control']) }}
    @endslot
    @slot('block_two')
        {{ Form::label('ds_link', 'Link', ['class' => 'col-sm-2 control-label']) }}
        {{ Form::text('ds_link[]', $data[5]['ds_link'], ['class' => 'form-control', 'maxlength' => 80]) }}
    @endslot
    @slot('block_three')
        {{ Form::label('ds_titulo', 'Título', ['class' => 'col-sm-2 col-label']) }}
        {{ Form::text('ds_titulo[]', $data[5]['ds_titulo'], ['class' => 'form-control', 'maxlength' => 80]) }}
    @endslot
@endcomponent

@component('admin.form-components._form_group_validation')
    @slot('title')
        Notícia 4
    @endslot
    @slot('block_one')
        {{ Form::label('ds_categoria', 'Chapéu', ['class' => 'col-sm-2 col-label']) }}
        {{ Form::select('ds_categoria[]', \App\Models\NoticiasCategoria::pluck('ds_categoria', 'ds_categoria'), $data[6]['ds_categoria'], ['placeholder' => 'Selecione a Categoria', 'class' => 'form-control']) }}
    @endslot
    @slot('block_two')
        {{ Form::label('ds_link', 'Link', ['class' => 'col-sm-2 control-label']) }}
        {{ Form::text('ds_link[]', $data[6]['ds_link'], ['class' => 'form-control', 'maxlength' => 80]) }}
    @endslot
    @slot('block_three')
        {{ Form::label('ds_titulo', 'Título', ['class' => 'col-sm-2 col-label']) }}
        {{ Form::text('ds_titulo[]', $data[6]['ds_titulo'], ['class' => 'form-control', 'maxlength' => 80]) }}
    @endslot
@endcomponent
