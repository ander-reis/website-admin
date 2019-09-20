@extends('layouts.admin')

@section('content')

{{--    {{ Form::open(['route' => 'admin.home-page.store', 'id' => 'homePageForm']) }}--}}
{{--    @include('admin.home-page._form')--}}
{{--    <button type="submit" class="btn btn-primary">Cadastrar</button>--}}
{{--    {{ Form::close() }}--}}

    {{ Form::open(['route' => 'admin.home-page.store', 'id' => 'formHomePage']) }}
{{--    @include('admin.home-page.tab')--}}
    @include('admin.home-page._form')

    <input type="hidden" id="action" name="action" value="preview">
    {{--        {{ Form::submit('Cadastrar',['name' => 'btnCadastrar', 'id' => 'btnCadastrar', 'class' => 'btn btn-primary']) }}--}}
    <button type="submit" id="cadastrar" class="btn btn-primary">Cadastrar</button>
    <button type="submit" id="preview" class="btn btn-primary">Preview</button>
    {{ Form::open(['route' => 'admin.home-page.store']) }}
    @include('admin.home-page.tab')
    <button type="submit" class="btn btn-primary">Cadastrar</button>
    {{ Form::close() }}

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
                console.log(form);
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
                            'ds_titulo[]': {
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

        {{--    <script type="text/javascript">--}}
        {{--        $(document).ready(function () {--}}
        {{--            $('#homePreview').click(function (e) {--}}
        {{--                //ds_titulo--}}
        {{--                var ds_titulo = [];--}}
        {{--                $("input[name='ds_titulo[]']").each(function(){--}}
        {{--                    ds_titulo.push($(this).val());--}}
        {{--                });--}}
        {{--                e.preventDefault();--}}
        {{--                $.ajax({--}}
        {{--                    url: "{{ url('admin/preview') }}",--}}
        {{--                    method: 'post',--}}
        {{--                    dataType: 'json',--}}
        {{--                    headers: {--}}
        {{--                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
        {{--                    },--}}
        {{--                    data: {--}}
        {{--                        data: ds_titulo,--}}
        {{--                    },--}}
        {{--                    success: function (result) {--}}
        {{--                        if(result){--}}
        {{--                            //--}}
        {{--                        }--}}
        {{--                    }--}}
        {{--                });--}}
        {{--            });--}}
        {{--        });--}}
        {{--    </script>--}}
    @endpush

@endsection()
