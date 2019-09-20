<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#perfil" role="tab" aria-controls="profile" aria-selected="false">Perfil</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contato" role="tab" aria-controls="contact" aria-selected="false">Contato</a>
    </li>
</ul>

<div class="tab-content" id="myTabContent">

    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="container mt-2">

            @component('admin.form-components._input_inline',['field' => 'ds_categoria'])
                @slot('label')
                    {{ Form::label('ds_categoria', 'Chapéu', ['class' => 'col-sm-2 col-form-label']) }}
                @endslot
                @slot('input')
                    {{ Form::select('ds_categoria[]', \App\Models\NoticiasCategoria::pluck('ds_categoria', 'id_categoria'), null, ['placeholder' => 'Selecione a Categoria', 'class' => 'form-control']) }}
                @endslot
            @endcomponent

            @component('admin.form-components._input_inline',['field' => 'ds_titulo'])
                @slot('label')
                    {{ Form::label('ds_titulo', 'Título', ['class' => 'col-sm-2 col-form-label']) }}
                @endslot
                @slot('input')
                    {{ Form::text('ds_titulo[]', null, ['class' => 'form-control', 'maxlength' => 80]) }}
                @endslot
            @endcomponent

        </div>
    </div>

    <div class="tab-pane fade" id="perfil" role="tabpanel" aria-labelledby="profile-tab">
        <div class="container mt-2">

            @component('admin.form-components._input_inline',['field' => 'ds_categoria'])
                @slot('label')
                    {{ Form::label('ds_categoria', 'Chapéu', ['class' => 'col-sm-2 col-form-label']) }}
                @endslot
                @slot('input')
                    {{ Form::select('ds_categoria[]', \App\Models\NoticiasCategoria::pluck('ds_categoria', 'id_categoria'), null, ['placeholder' => 'Selecione a Categoria', 'class' => 'form-control']) }}
                @endslot
            @endcomponent

            @component('admin.form-components._input_inline',['field' => 'ds_titulo'])
                @slot('label')
                    {{ Form::label('ds_titulo', 'Título', ['class' => 'col-sm-2 col-form-label']) }}
                @endslot
                @slot('input')
                    {{ Form::text('ds_titulo[]', null, ['class' => 'form-control', 'maxlength' => 80]) }}
                @endslot
            @endcomponent

        </div>
    </div>

<<<<<<< HEAD
    <div class="tab-pane fade" id="contato" role="tabpanel" aria-labelledby="contact-tab">
=======
    <div class="tab-pane fade" id="destaque3" role="tabpanel" aria-labelledby="destaque3-tab">
>>>>>>> Correção drag-drop;
        <div class="container mt-2">

            @component('admin.form-components._input_inline',['field' => 'ds_categoria'])
                @slot('label')
                    {{ Form::label('ds_categoria', 'Chapéu', ['class' => 'col-sm-2 col-form-label']) }}
                @endslot
                @slot('input')
<<<<<<< HEAD
                    {{ Form::select('ds_categoria[]', \App\Models\NoticiasCategoria::pluck('ds_categoria', 'id_categoria'), null, ['placeholder' => 'Selecione a Categoria', 'class' => 'form-control']) }}
=======
                    {{ Form::select('ds_categoria[]', \App\Models\NoticiasCategoria::pluck('ds_categoria', 'ds_categoria'), null, ['placeholder' => 'Selecione a Categoria', 'class' => 'form-control']) }}
>>>>>>> Correção drag-drop;
                @endslot
            @endcomponent

            @component('admin.form-components._input_inline',['field' => 'ds_titulo'])
                @slot('label')
                    {{ Form::label('ds_titulo', 'Título', ['class' => 'col-sm-2 col-form-label']) }}
                @endslot
                @slot('input')
                    {{ Form::text('ds_titulo[]', null, ['class' => 'form-control', 'maxlength' => 80]) }}
                @endslot
            @endcomponent

        </div>
    </div>

</div>

