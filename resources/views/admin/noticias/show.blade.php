@extends('layouts.admin')

@section('content')
    <div class="container">
        <fieldset class="scheduler-border">
            <legend class="scheduler-border">Título</legend>
            <div class="control-group">
                <div class="controls bootstrap-timepicker">
                    {{ $noticia->ds_resumo }}
                </div>
            </div>
        </fieldset>

        <fieldset class="scheduler-border">
            <legend class="scheduler-border">Texto</legend>
            <div class="control-group">
                <div class="controls bootstrap-timepicker">
                    {{ $noticia->ds_texto }}
                </div>
            </div>
        </fieldset>

        <fieldset class="scheduler-border">
            <legend class="scheduler-border">Palavra Chave</legend>
            <div class="control-group">
                <div class="controls bootstrap-timepicker">
                    {{ $noticia->ds_palavra_chave }}
                </div>
            </div>
        </fieldset>

        <fieldset class="scheduler-border">
            <legend class="scheduler-border">Destaque</legend>
            <div class="control-group">
                <div class="controls bootstrap-timepicker">
                    @if($noticia->fl_exibir_destaque)
                        <p>Em Destaque</p>
                    @else
                        <p>Sem Destaque</p>
                    @endif
                </div>
            </div>
        </fieldset>

        <fieldset class="scheduler-border">
            <legend class="scheduler-border">Data da Notícia</legend>
            <div class="control-group">
                <div class="controls bootstrap-timepicker">
                    {{ $noticia->dt_cadastro_utc_formatted }}
                </div>
            </div>
        </fieldset>

        <fieldset class="scheduler-border">
            <legend class="scheduler-border">Horário da Notícia</legend>
            <div class="control-group">
                <div class="controls bootstrap-timepicker">
                    {{ $noticia->hr_noticia_formatted }}
                </div>
            </div>
        </fieldset>

        <fieldset class="scheduler-border">
            <legend class="scheduler-border">Status da Notícia</legend>
            <div class="control-group">
                <div class="controls bootstrap-timepicker">
                    {!! $noticia->fl_oculta_formatted !!}
                </div>
            </div>
        </fieldset>
    </div>
@endsection()
