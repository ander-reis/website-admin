@component('admin.form-components._form_group_validation')
    @slot('title')
        Manchete Principal
    @endslot
    @slot('block_one')
        {{ Form::label('ds_categoria', 'Chapéu', ['class' => 'col-sm-2 col-label']) }}
        {{ Form::select('ds_categoria[]', \App\Models\NoticiasCategoria::pluck('ds_categoria', 'ds_categoria'), isset($data[0]['ds_categoria'])?$data[0]['ds_categoria']:null, ['placeholder' => 'Selecione a Categoria', 'class' => 'form-control']) }}
    @endslot
    @slot('block_two')
        {{ Form::label('ds_link', 'Link', ['class' => 'col-sm-2 control-label']) }}
        {{ Form::text('ds_link[]', isset($data[0]['ds_link'])?$data[0]['ds_link']:null, ['class' => 'form-control', 'maxlength' => 150]) }}
    @endslot
    @slot('block_three')
        {{ Form::label('ds_titulo', 'Título', ['class' => 'col-sm-2 col-label']) }}
        {{ Form::text('ds_titulo[]', isset($data[0]['ds_titulo'])?$data[0]['ds_titulo']:null, ['class' => 'form-control', 'maxlength' => 100]) }}
    @endslot
    @slot('block_four')
        {{ Form::label('ds_texto_noticia', 'Texto', ['class' => 'col-sm-2 control-label']) }}
        {{ Form::textarea('ds_texto_noticia[]', isset($data[0]['ds_texto_noticia'])?$data[0]['ds_texto_noticia']:null, ['class' => 'form-control', 'rows' => 3]) }}
    @endslot
@endcomponent
@component('admin.form-components._form_group_validation')
    @slot('title')
        Destaque 1
    @endslot
    @slot('block_one')
        {{ Form::label('ds_categoria', 'Chapéu', ['class' => 'col-sm-2 col-label']) }}
        {{ Form::select('ds_categoria[]', \App\Models\NoticiasCategoria::pluck('ds_categoria', 'ds_categoria'), isset($data[1]['ds_categoria'])?$data[1]['ds_categoria']:null, ['placeholder' => 'Selecione a Categoria', 'class' => 'form-control']) }}
    @endslot
    @slot('block_two')
        {{ Form::label('ds_link', 'Link', ['class' => 'col-sm-2 control-label']) }}
        {{ Form::text('ds_link[]', isset($data[1]['ds_link'])?$data[1]['ds_link']:null, ['class' => 'form-control', 'maxlength' => 150]) }}
    @endslot
    @slot('block_three')
        {{ Form::label('ds_titulo', 'Título', ['class' => 'col-sm-2 col-label']) }}
        {{ Form::text('ds_titulo[]', isset($data[1]['ds_titulo'])?$data[1]['ds_titulo']:null, ['class' => 'form-control', 'maxlength' => 100]) }}
    @endslot
    @slot('block_four')
        {{ Form::label('ds_texto_noticia', 'Texto', ['class' => 'col-sm-2 control-label']) }}
        {{ Form::textarea('ds_texto_noticia[]', isset($data[1]['ds_texto_noticia'])?$data[1]['ds_texto_noticia']:null, ['class' => 'form-control', 'rows' => 3]) }}
    @endslot
@endcomponent


@component('admin.form-components._form_group_validation')
    @slot('title')
        Destaque 2
    @endslot
    @slot('block_one')
        {{ Form::label('ds_categoria', 'Chapéu', ['class' => 'col-sm-2 col-label']) }}
        {{ Form::select('ds_categoria[]', \App\Models\NoticiasCategoria::pluck('ds_categoria', 'ds_categoria'), isset($data[2]['ds_categoria'])?$data[2]['ds_categoria']:null, ['placeholder' => 'Selecione a Categoria', 'class' => 'form-control']) }}
    @endslot
    @slot('block_two')
        {{ Form::label('ds_link', 'Link', ['class' => 'col-sm-2 control-label']) }}
        {{ Form::text('ds_link[]', isset($data[2]['ds_link'])?$data[2]['ds_link']:null, ['class' => 'form-control', 'maxlength' => 150]) }}
    @endslot
    @slot('block_three')
        {{ Form::label('ds_titulo', 'Título', ['class' => 'col-sm-2 col-label']) }}
        {{ Form::text('ds_titulo[]', isset($data[2]['ds_titulo'])?$data[2]['ds_titulo']:null, ['class' => 'form-control', 'maxlength' => 100]) }}
    @endslot
    @slot('block_four')
        {{ Form::label('ds_texto_noticia', 'Texto', ['class' => 'col-sm-2 control-label']) }}
        {{ Form::textarea('ds_texto_noticia[]', isset($data[2]['ds_texto_noticia'])?$data[2]['ds_texto_noticia']:null, ['class' => 'form-control', 'rows' => 3]) }}
    @endslot
@endcomponent

@component('admin.form-components._form_group_validation')
    @slot('title')
        Notícia 1
    @endslot
    @slot('block_one')
        {{ Form::label('ds_categoria', 'Chapéu', ['class' => 'col-sm-2 col-label']) }}
        {{ Form::select('ds_categoria[]', \App\Models\NoticiasCategoria::pluck('ds_categoria', 'ds_categoria'), isset($data[3]['ds_categoria'])?$data[3]['ds_categoria']:null, ['placeholder' => 'Selecione a Categoria', 'class' => 'form-control']) }}
    @endslot
    @slot('block_two')
        {{ Form::label('ds_link', 'Link', ['class' => 'col-sm-2 control-label']) }}
        {{ Form::text('ds_link[]', isset($data[3]['ds_link'])?$data[3]['ds_link']:null, ['class' => 'form-control', 'maxlength' => 150]) }}
    @endslot
    @slot('block_three')
        {{ Form::label('ds_titulo', 'Título', ['class' => 'col-sm-2 col-label']) }}
        {{ Form::text('ds_titulo[]', isset($data[3]['ds_titulo'])?$data[3]['ds_titulo']:null, ['class' => 'form-control', 'maxlength' => 100]) }}
    @endslot
@endcomponent

@component('admin.form-components._form_group_validation')
    @slot('title')
        Notícia 2
    @endslot
    @slot('block_one')
        {{ Form::label('ds_categoria', 'Chapéu', ['class' => 'col-sm-2 col-label']) }}
        {{ Form::select('ds_categoria[]', \App\Models\NoticiasCategoria::pluck('ds_categoria', 'ds_categoria'), isset($data[4]['ds_categoria'])?$data[4]['ds_categoria']:null, ['placeholder' => 'Selecione a Categoria', 'class' => 'form-control']) }}
    @endslot
    @slot('block_two')
        {{ Form::label('ds_link', 'Link', ['class' => 'col-sm-2 control-label']) }}
        {{ Form::text('ds_link[]', isset($data[4]['ds_link'])?$data[4]['ds_link']:null, ['class' => 'form-control', 'maxlength' => 150]) }}
    @endslot
    @slot('block_three')
        {{ Form::label('ds_titulo', 'Título', ['class' => 'col-sm-2 col-label']) }}
        {{ Form::text('ds_titulo[]', isset($data[4]['ds_titulo'])?$data[4]['ds_titulo']:null, ['class' => 'form-control', 'maxlength' => 100]) }}
    @endslot
@endcomponent

@component('admin.form-components._form_group_validation')
    @slot('title')
        Notícia 3
    @endslot
    @slot('block_one')
        {{ Form::label('ds_categoria', 'Chapéu', ['class' => 'col-sm-2 col-label']) }}
        {{ Form::select('ds_categoria[]', \App\Models\NoticiasCategoria::pluck('ds_categoria', 'ds_categoria'), isset($data[5]['ds_categoria'])?$data[5]['ds_categoria']:null, ['placeholder' => 'Selecione a Categoria', 'class' => 'form-control']) }}
    @endslot
    @slot('block_two')
        {{ Form::label('ds_link', 'Link', ['class' => 'col-sm-2 control-label']) }}
        {{ Form::text('ds_link[]', isset($data[5]['ds_link'])?$data[5]['ds_link']:null, ['class' => 'form-control', 'maxlength' => 150]) }}
    @endslot
    @slot('block_three')
        {{ Form::label('ds_titulo', 'Título', ['class' => 'col-sm-2 col-label']) }}
        {{ Form::text('ds_titulo[]', isset($data[5]['ds_titulo'])?$data[5]['ds_titulo']:null, ['class' => 'form-control', 'maxlength' => 100]) }}
    @endslot
@endcomponent

@component('admin.form-components._form_group_validation')
    @slot('title')
        Notícia 4
    @endslot
    @slot('block_one')
        {{ Form::label('ds_categoria', 'Chapéu', ['class' => 'col-sm-2 col-label']) }}
        {{ Form::select('ds_categoria[]', \App\Models\NoticiasCategoria::pluck('ds_categoria', 'ds_categoria'), isset($data[6]['ds_categoria'])?$data[6]['ds_categoria']:null, ['placeholder' => 'Selecione a Categoria', 'class' => 'form-control']) }}
    @endslot
    @slot('block_two')
        {{ Form::label('ds_link', 'Link', ['class' => 'col-sm-2 control-label']) }}
        {{ Form::text('ds_link[]', isset($data[6]['ds_link'])?$data[6]['ds_link']:null, ['class' => 'form-control', 'maxlength' => 150]) }}
    @endslot
    @slot('block_three')
        {{ Form::label('ds_titulo', 'Título', ['class' => 'col-sm-2 col-label']) }}
        {{ Form::text('ds_titulo[]', isset($data[6]['ds_titulo'])?$data[6]['ds_titulo']:null, ['class' => 'form-control', 'maxlength' => 100]) }}
    @endslot
@endcomponent

<section class="card mb-2">
    <div class="row">
        <div class="col-12">
            <div class="card-header text-center">
                <h3>Revista Giz</h3>
            </div>
        </div>
        <div class="card-body row">
            <div class="col-6">
                <div class="form-group">
                    <div class="custom-file form-group">
                        {{ Form::file('ds_imagem', ['class' => 'custom-file-input', 'lang' => 'br', 'id' => 'btn_img', 'accept' => 'image/*']) }}
                        {{ Form::label('ds_imagem', 'Upload Imagem', ['class' => 'custom-file-label control-label']) }}
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <div id="div_img" class="img-giz" style="{{ (isset($data)) ? '' : 'display: none;' }}">
                        <img id="img_giz" class="img-fluid rounded giz-img"
                             src="{{ ($data[7]['updated_at'] > $temp->updated_at) ? asset('/storage/revista_giz/' . $data[7]['id'] . '/' . $data[7]['ds_imagem']) : asset('/storage/revista_giz_temp/' . $temp->id . '/' . $temp->ds_imagem) }} "
                             alt="{!! $data[7]['ds_titulo'] !!}">
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    {{ Form::label('ds_link', 'Link', ['class' => 'col-sm-2 control-label']) }}
                    {{ Form::text('ds_giz[]', isset($data[7]['ds_link'])?$data[7]['ds_link']:null, ['class' => 'form-control', 'maxlength' => 150]) }}
                </div>
            </div>
            <div class="col-12 no-gutters">
                <div class="form-group">
                    {{ Form::label('ds_titulo', 'Título', ['class' => 'col-sm-2 col-label']) }}
                    {{ Form::text('ds_giz[]', isset($data[7]['ds_titulo'])?$data[7]['ds_titulo']:null, ['class' => 'form-control', 'maxlength' => 100]) }}
                </div>
                <div class="form-group">
                    {{ Form::label('ds_texto_noticia', 'Texto', ['class' => 'col-sm-2 control-label']) }}
                    {{ Form::textarea('ds_giz[]', isset($data[7]['ds_texto_noticia'])?$data[7]['ds_texto_noticia']:null, ['class' => 'form-control', 'rows' => 3]) }}
                </div>
            </div>
        </div>
    </div>
</section>

@push('preview-script')
    <script type="text/javascript">
        function previewImage(file) {
            var imageType = /image.*/;

            if (!file.type.match(imageType)) {
                throw "File Type must be an image";
            }

            var img = document.createElement("img");

            let element = document.getElementById('img_giz');
            if (typeof (element) != 'undefined' && element != null) {
                document.getElementById("img_giz").remove();
            }
            var thumb = document.getElementById("div_img");

            img.id = 'img_giz';
            img.alt = "Imagem RevistaGiz";
            img.classList.add('img-fluid', 'rounded', 'giz-img');

            img.file = file;
            thumb.appendChild(img);

            // Using FileReader to display the image content
            var reader = new FileReader();
            reader.onload = (function (aImg) {
                return function (e) {
                    aImg.src = e.target.result;
                };
            })(img);
            reader.readAsDataURL(file);
        }

        var btn_img = document.querySelector('#btn_img');
        btn_img.addEventListener('change', function () {
            $("#div_img").show();
            var files = this.files;
            for (var i = 0; i < files.length; i++) {
                previewImage(this.files[i], 0);
            }
        }, false);
    </script>
@endpush
