@extends('layouts.admin')

@section('content')
    <!-- Drag and Drop -->
    <script src="{{ asset('js/redips-drag-min.js') }}"></script>
    <script src="{{ asset('js/redips-table-min.js') }}"></script>
    <script src="{{ asset('js/drag-drop.js') }}"></script>

    <div class="row" onload="REDIPS.drag.init()">
        <h1>Ordem Notícias</h1>
        <div id="redips-drag">
            <div id="step1Content" class="row no-gutters">
                @foreach($ordemNoticias as $key => $ordem)
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body card-not">
                                <h6 class="card-subtitle mb-2 text-right {{ ($ordem->fl_status == 1 ? 'text-muted' : 'text-danger') }}">
                                    {{ dtCadastroFormatted($ordem->dt_cadastro) }} {{ ($ordem->fl_status == 1 ? '' : ' **') }}
                                </h6>
                                <p class="card-text text-left">{!! $ordem->ds_resumo !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- main table -->
            <table id="tblEditor" name="tblEditor">
                <colgroup>
                    <col width="278"/>
                    <col width="278"/>
                    <col width="278"/>
                    <col width="278"/>
                    <col width="278"/>
                </colgroup>
                <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
            <div class="py-3">
                @can('ordem-noticias.create')
                    <input type="button" value="Salvar" class="btn btn-primary" onclick="redips.save()"
                           title="Salvar"/>
                @endcan
            </div>
            <div>
                <table id="tblComponents">
                    <colgroup>
                        <col width="280"/>
                        <col width="280"/>
                        <col width="280"/>
                        <col width="280"/>
                    </colgroup>
                    <tbody>
                    @foreach($noticias as $key => $noticia)
                        @if(($key % 4) == 0)
                            <tr>
                                @endif
                                <td class="redips-mark">
                                    <div class="redips-drag" id="not-{{$noticia->id}}">
                                        <div class="card {{$noticia->class}}">
                                            <div class="card-body card-not">
                                                    <h6 class="card-subtitle mb-2 text-right {{ ($noticia->fl_status == 1 ? 'text-muted' : 'text-danger') }}">
                                                    {{ dtCadastroFormatted($noticia->dt_cadastro) }} {{ ($noticia->fl_status == 1 ? '' : ' **') }}
                                                </h6>
                                                <p class="card-text text-left">{!! $noticia->ds_resumo !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                @if(($key % 4) == 3)
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div><!-- drag container -->
    </div>
@endsection()

