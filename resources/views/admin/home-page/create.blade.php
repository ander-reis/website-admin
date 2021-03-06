@extends('layouts.admin')

@section('content')

    {{ Form::model([$data, $temp], ['route' => 'admin.home-page.store', 'files' => true, 'id' => 'formHomePage']) }}
    @include('admin.home-page._form')
    {{ Form::hidden('action', 'preview', ['id' => 'action']) }}
    {{ Form::submit('Salvar', ['id' => 'cadastrar', 'class' => 'btn btn-primary']) }}
    {{ Form::submit('Preview', ['id' => 'preview', 'class' => 'btn btn-secondary']) }}

    {{ Form::close() }}
@endsection()

@push('preview-script')
<script type="text/javascript">
    $('#cadastrar').click(() => {
        $('#action').val('cadastrar');
    });
    $('#preview').click(() => {
        $('#action').val('preview');
    });
    document.addEventListener('DOMContentLoaded', function (e) {
        const form = document.getElementById('formHomePage');
        FormValidation.formValidation(
            form,
            {
                fields: {
                    'ds_categoria[]': {
                        validators: {
                            notEmpty: {
                                message: 'Campo obrigatório'
                            }
                        },
                    },
                    'ds_link[]': {
                        validators: {
                            notEmpty: {
                                message: 'Campo obrigatório'
                            }
                        },
                    },
                    'ds_titulo[]': {
                        validators: {
                            notEmpty: {
                                message: 'Campo obrigatório'
                            }
                        },
                    },
                    'ds_texto_noticia[]': {
                        validators: {
                            notEmpty: {
                                message: 'Campo obrigatório'
                            }
                        },
                    },
                    // 'ds_imagem': {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'Campo obrigatório'
                    //         }
                    //     },
                    // },
                    'ds_giz[]': {
                        validators: {
                            notEmpty: {
                                message: 'Campo obrigatório'
                            }
                        },
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap(),
                    defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    icon: new FormValidation.plugins.Icon({
                        valid: 'fa fa-check',
                        invalid: 'fa fa-times',
                        validating: 'fa fa-refresh',
                    }),
                },
            }
        );
    });
</script>
@endpush
