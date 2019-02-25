@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <fieldset class="scheduler-border col-12">
                <legend class="scheduler-border">Título</legend>
                <div class="control-group">
                    <div class="controls bootstrap-timepicker">
                        {{ $model->ds_titulo }}
                    </div>
                </div>
            </fieldset>

            <fieldset class="scheduler-border col-12">
                <legend class="scheduler-border">Convenção PDF</legend>
                <div class="control-group">
                    <div class="controls bootstrap-timepicker">
                        @if(isset($model->url_arquivo))
                            @component('admin.components._download_pdf')
                                {{ $model->convencao_asset }}
                            @endcomponent
                        @endif
                    </div>
                </div>
            </fieldset>

            <fieldset class="scheduler-border col-md-6">
                <legend class="scheduler-border">Data Validade</legend>
                <div class="control-group">
                    <div class="controls bootstrap-timepicker">
                        {{ $model->dt_validade }}
                    </div>
                </div>
            </fieldset>

            <fieldset class="scheduler-border col-md-6">
                <legend class="scheduler-border">Status da Convenção</legend>
                <div class="control-group">
                    <div class="controls bootstrap-timepicker">
                        {!! flStatus($model->fl_ativo) !!}
                    </div>
                </div>
            </fieldset>

            @if(!blank($model->ds_titulo_aditamento))
                <fieldset class="scheduler-border col-12">
                    <legend class="scheduler-border">Título Aditamento</legend>
                    <div class="control-group">
                        <div class="controls bootstrap-timepicker">
                            {{ $model->ds_titulo_aditamento }}
                        </div>
                    </div>
                </fieldset>

                <fieldset class="scheduler-border col-12">
                    <legend class="scheduler-border">Aditamento PDF</legend>
                    <div class="control-group">
                        <div class="controls bootstrap-timepicker">
                            @if(isset($model->url_aditamento))
                                @component('admin.components._download_pdf')
                                    {{ $model->aditamento_asset }}
                                @endcomponent
                            @endif
                        </div>
                    </div>
                </fieldset>
            @endif

        </div>
    </div>
@endsection()
