<section class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-12 form-group">
                    <p>Upload</p>
                    <div class="custom-file form-group">
                        {{ Form::file('ds_imagem', ['class' => 'custom-file-input', 'lang' => 'br', 'id' => 'btn_imagem', 'accept' => 'image/*']) }}
                        {{ Form::label('ds_imagem', 'Upload Imagem', ['class' => 'custom-file-label control-label']) }}
                    </div>
            </div>
        </div>
    </div>
</section>

@component('admin.form-components._form_group', ['field' => 'ds_label'])
    {{ Form::label('lb_label', 'Chapéu', ['class' => 'control-label']) }}
    {{ Form::text('ds_label', null, ['class' => 'form-control', 'maxlength' => 40, 'id' => 'ds_label']) }}
@endcomponent

@component('admin.form-components._form_group', ['field' => 'ds_titulo'])
    {{ Form::label('lb_titulo', 'Título', ['class' => 'control-label']) }}
    {{ Form::text('ds_titulo', null, ['class' => 'form-control', 'maxlength' => 70, 'id' => 'ds_titulo']) }}
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

<div class="row">
    <div class="col-12">
        @component('admin.form-components._form_group', ['field' => 'ds_imagem'])
            <div class="col-lg-5" id="div_carousel" style="{{ (isset($slider)) ? '' : 'display: none;' }}">
                {{--slider--}}
                <div id="carousel-sinpro" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-sinpro" data-slide-to="0" class="active"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="gradient_img">
                                    <div id="div_imagem" class="slider-img">
                                            @if (isset($slider))
                                        <img id='img_imagem' class="d-block w-100"
                                        src="{{ (isset($slider)) ? $slider->thumb_asset : ''}}"
                                        alt="Título">
                                        @endif
                                    </div>
                            </div>
                            <div class="carousel-caption p-2">
                                <h5 class="m-0 p-0"><span id="sp_chapeu" name="sp_chapeu">{{ (isset($slider)) ? $slider->ds_label : '' }}</span></h5>
                                <p class="m-0 pb-2"><span id="sp_titulo" name="sp_titulo">{{  (isset($slider)) ? $slider->ds_titulo : '' }}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                {{--slider end--}}
            </div>
        @endcomponent
    </div>
</div>

@push('preview-script')
    <script type="text/javascript">
        function previewImage(file) {
            var imageType = /image.*/;

            if (!file.type.match(imageType)) {
                throw "File Type must be an image";
            }

            var img = document.createElement("img");

            let element =  document.getElementById('img_imagem');
            if (typeof(element) != 'undefined' && element != null) {
                document.getElementById("img_imagem").remove();
            }
            var thumb = document.getElementById("div_imagem");

            img.id = 'img_imagem';
            img.alt = "Imagem Slider";
            img.classList.add('img-fluid', 'rounded', 'slider-img');

            img.file = file;
            thumb.appendChild(img);

            // Using FileReader to display the image content
            var reader = new FileReader();
            reader.onload = (function(aImg) {
                return function(e) {
                    aImg.src = e.target.result;
                };
            })(img);
            reader.readAsDataURL(file);
        }

        var btn_imagem = document.querySelector('#btn_imagem');
        btn_imagem.addEventListener('change', function() {
            $("#div_carousel").show();
            var files = this.files;
            for (var i = 0; i < files.length; i++) {
                previewImage(this.files[i]);
            }
        }, false);

        var ds_chapeu = document.querySelector('#ds_label');
        ds_chapeu.addEventListener('keyup', function() {
            $("#sp_chapeu").text(this.value);
        }, false);

        var ds_chapeu = document.querySelector('#ds_titulo');
        ds_titulo.addEventListener('keyup', function() {
            $("#sp_titulo").text(this.value);
        }, false);

        document.addEventListener('DOMContentLoaded', function (e) {
            const form = document.getElementById('formSlider');
            FormValidation.formValidation(
                form,
                {
                    fields: {
                        'ds_label': {
                            validators: {
                                notEmpty: {
                                    message: 'Campo obrigatório'
                                },
                                stringLength: {
                                    min: 3,
                                    message: 'Campo deve ter pelo menos 3 caracteres'
                                }
                            },
                        },
                        'ds_titulo': {
                            validators: {
                                notEmpty: {
                                    message: 'Campo obrigatório'
                                }
                            },
                        },
                        'ds_link': {
                            validators: {
                                notEmpty: {
                                    message: 'Campo obrigatório'
                                },
                                uri: {
                                    message: 'Link Inválido'
                                }
                            },
                        },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap(),
                        defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                        submitButton: new FormValidation.plugins.SubmitButton(),
                    },
                }
            );
        });

    </script>
@endpush
