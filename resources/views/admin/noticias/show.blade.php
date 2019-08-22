@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <fieldset class="scheduler-border col-12">
                <legend class="scheduler-border">Título</legend>
                <div class="control-group">
                    <div class="controls bootstrap-timepicker">
                        {{ $model->ds_resumo }}
                    </div>
                </div>
            </fieldset>

            <fieldset class="scheduler-border col-12">
                <legend class="scheduler-border">Texto</legend>
                <div class="control-group">
                    <div class="controls bootstrap-timepicker">
                        {!! $model->ds_texto !!}
                    </div>
                </div>
            </fieldset>

            <fieldset class="scheduler-border col-12">
                <legend class="scheduler-border">Palavra Chave</legend>
                <div class="control-group">
                    <div class="controls bootstrap-timepicker">
                        {{ $model->ds_palavra_chave }}
                    </div>
                </div>
            </fieldset>

            <fieldset class="scheduler-border col-12">
                <legend class="scheduler-border">Destaque</legend>
                <div class="control-group">
                    <div class="controls bootstrap-timepicker">
                        @if($model->fl_exibir_destaque)
                            <p>Em Destaque</p>
                        @else
                            <p>Sem Destaque</p>
                        @endif
                    </div>
                </div>
            </fieldset>

            <fieldset class="scheduler-border col-4">
                <legend class="scheduler-border">Data da Notícia</legend>
                <div class="control-group">
                    <div class="controls bootstrap-timepicker">
                        {{ $model->dt_cadastro_formatted }}
                    </div>
                </div>
            </fieldset>

            <fieldset class="scheduler-border col-4">
                <legend class="scheduler-border">Horário da Notícia</legend>
                <div class="control-group">
                    <div class="controls bootstrap-timepicker">
                        {{ $model->hr_noticia_formatted }}
                    </div>
                </div>
            </fieldset>

            <fieldset class="scheduler-border col-4">
                <legend class="scheduler-border">Status da Notícia</legend>
                <div class="control-group">
                    <div class="controls bootstrap-timepicker">
                        {!! flStatus($model->fl_status) !!}
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
@endsection()
