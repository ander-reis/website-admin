@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1>Conteúdo</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>Título</th>
                    <th class="text-center">Status da Página</th>
                    <th class="text-center">Editar</th>
                    <th class="text-center">Ver</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $item)
                    <tr>
                        <td>{{ $item->txt_titulo }}</td>
                        <td class="text-center">{!! flStatus($item->fl_status) !!}</td>
                        <td class="text-center">
                            @can('paginas-principais.update')
                                <a class="text-dark link-icon"
                                   href="{{ route('admin.paginas-principais.edit', ['id' => $item->id_pagina]) }}">
                                    <i class="fas fa-edit fa-2x"></i>
                                </a>
                            @endcan
                            @cannot('paginas-principais.update')
                                <i class="fa fa-exclamation-circle fa-2x text-danger" aria-hidden="true"></i>
                            @endcannot
                        </td>
                        <td class="text-center">
                            @can('paginas-principais.view')
                                <a href="{{ env('APP_URL_SITE_VER_PAGINA') .  $item->url }}" target="_blank">
                                    <i class="fas fa-eye fa-2x"></i>
                                </a>
                            @endcan
                            @cannot('paginas-principais.view')
                                <i class="fas fa-eye-slash fa-2x text-danger"></i>
                            @endcannot
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection()
