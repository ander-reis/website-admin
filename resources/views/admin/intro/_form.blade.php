<section class="row">
    <div class="col-6">
        <div class="row">
            <div class="col-12">
                <p>Imagem Desktop</p>
                <div class="custom-file form-group">
                    {{ Form::file('ds_imagem_desktop', ['class' => 'custom-file-input', 'lang' => 'br', 'id' => 'btn_desktop', 'accept' => 'image/*']) }}
                    {{ Form::label('ds_imagem_desktop', 'Upload Imagem Desktop', ['class' => 'custom-file-label control-label']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-3">
                @component('admin.form-components._form_group', ['field' => 'ds_imagem_desktop'])
                    <div class="form-group">
                        <div id="div_desktop" class="intro-img-desktop" style="{{ (isset($intro)) ? '' : 'display: none;' }}">
                            @if (isset($intro) && !$errors->has('ds_imagem_desktop') && !$errors->has('ds_imagem_mobile'))
                                <img id='img_desktop' class="img-fluid rounded img-intro-desktop" src="{{ $intro->thumb_desktop_asset }}" alt="{!! $intro->ds_titulo !!}">
                            @endif
                        </div>
                    </div>
                @endcomponent
            </div>
        </div>
    </div>

    <div class="col-6">
        <div class="row">
            <div class="col-12">
                <p>Imagem Mobile</p>
                <div class="custom-file form-group">
                    {{ Form::file('ds_imagem_mobile', ['class' => 'custom-file-input', 'lang' => 'br', 'id' => 'btn_mobile', 'accept' => 'image/*']) }}
                    {{ Form::label('ds_imagem_mobile', 'Upload Imagem Mobile', ['class' => 'custom-file-label control-label']) }}
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-3">
                @component('admin.form-components._form_group', ['field' => 'ds_imagem_mobile'])
                    <div class="form-group">
                        <div id="div_mobile" class="intro-img-mobile" style="{{ (isset($intro)) ? '' : 'display: none;' }}">
                            @if (isset($intro) && !$errors->has('ds_imagem_desktop') && !$errors->has('ds_imagem_mobile'))
                                <img id='img_mobile' class="img-fluid rounded intro-img-mobile" src="{{ $intro->thumb_mobile_asset }}" alt="{!! $intro->ds_titulo !!}">
                            @endif
                        </div>
                    </div>
                @endcomponent
            </div>
        </div>
    </div>
</section>

@component('admin.form-components._form_group', ['field' => 'ds_titulo'])
{{ Form::label('ds_titulo', 'Título', ['class' => 'control-label']) }}
{{ Form::text('ds_titulo', null, ['class' => 'form-control', 'maxlength' => 50]) }}
@endcomponent

@component('admin.form-components._form_group', ['field' => 'ds_link'])
{{ Form::label('ds_link', 'Link', ['class' => 'control-label']) }}
{{ Form::text('ds_link', null, ['class' => 'form-control', 'maxlength' => 60]) }}
@endcomponent

<section class="row">
    <div class="col-6">
        @component('admin.form-components._form_group', ['field' => 'dt_de'])
        {{ Form::label('dt_de', 'De', ['class' => 'control-label']) }}
        {{ Form::input('datetime-local','dt_de',(isset($intro) ? datetimeUTC($intro->dt_de) : null), ['class' => 'form-control']) }}
    </div>
    @endcomponent
    <div class="col-6">
        @component('admin.form-components._form_group', ['field' => 'dt_ate'])
        {{ Form::label('dt_ate', 'Até', ['class' => 'control-label']) }}
        {{ Form::input('datetime-local','dt_ate',(isset($intro) ? datetimeUTC($intro->dt_ate) : null), ['class' => 'form-control']) }}
    </div>
    @endcomponent
</section>

@push('preview-script')
    <script type="text/javascript">
        function previewImage(file, btn) {
            var imageType = /image.*/;

            if (!file.type.match(imageType)) {
                throw "File Type must be an image";
            }

            var img = document.createElement("img");

            if (btn == 0 ) {
                let element =  document.getElementById('img_desktop');
                if (typeof(element) != 'undefined' && element != null) {
                    document.getElementById("img_desktop").remove();
                }
                var thumb = document.getElementById("div_desktop");

                img.id = 'img_desktop';
                img.alt = "Imagem Desktop";
                img.classList.add('img-fluid', 'rounded', 'intro-img-desktop');
            }
            else {
                let element =  document.getElementById('img_mobile');
                if (typeof(element) != 'undefined' && element != null) {
                    document.getElementById("img_mobile").remove();
                }
                var thumb = document.getElementById("div_mobile");

                img.id = 'img_mobile';
                img.alt = "Imagem Mobile";
                img.classList.add('img-fluid', 'rounded', 'intro-img-mobile');
            }

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

        function isValidDate(str) {
            // yyyy-mm-ddThh:mm
            var regex = /(\d{4})[-\/](\d{1,2})[-\/](\d{1,2})\s*(\d{0,2}):?(\d{0,2}):?(\d{0,2})/,
            parts = regex.exec(str);

            if (parts) {
                var date = new Date ( (+parts[1]), (+parts[2])-1, (+parts[3]), (+parts[4]), (+parts[5]), (+parts[6]) );
                if ( ( date.getDate() == parts[3] ) && ( date.getMonth() == parts[2]-1 ) && ( date.getFullYear() == parts[1] ) ) {
                return true;
                }
            }
            return false;
        }

        var btn_desktop = document.querySelector('#btn_desktop');
        btn_desktop.addEventListener('change', function() {
            $("#div_desktop").show();
            var files = this.files;
            for (var i = 0; i < files.length; i++) {
                previewImage(this.files[i], 0);
            }
        }, false);

        var btn_mobile = document.querySelector('#btn_mobile');
        btn_mobile.addEventListener('change', function() {
            $("#div_mobile").show();
            var files = this.files;
            for (var i = 0; i < files.length; i++) {
                previewImage(this.files[i], 1);
            }
        }, false);

        document.addEventListener('DOMContentLoaded', function (e) {
            const form = document.getElementById('formIntro');
            FormValidation.formValidation(
                form,
                {
                    fields: {
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
                        'dt_de': {
                            validators: {
                                callback: {
                                    message: 'Data Inválida',
                                    callback: function(input) {
                                        return isValidDate(input.value);
                                    }
                                },
                            },
                        },
                        'dt_ate': {
                            validators: {
                                callback: {
                                    message: 'Data Inválida',
                                    callback: function(input) {
                                        return isValidDate(input.value);
                                    }
                                },
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
