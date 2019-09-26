@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="my-3">
                <h1>Intro</h1>
            </div>
            <p>
                @can('intro.create')
                    <a href="{{ route('admin.intro.create') }}" class="btn btn-outline-primary mr-2 mt-2 mb-2">Cadastrar Intro</a>
                @endcan
            </p>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Imagem</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">De</th>
                    <th scope="col">Até</th>
                    <th scope="col" class="text-center">Editar</th>
                    <th scope="col" class="text-center">Excluir</th>
                </tr>
                </thead>
                <tbody>
                @foreach($intros as $intro)
                    <tr>
                        <td>{{ $intro->id }}</td>
                        <td>
                            <img class="rounded" src="{{ $intro->thumb_small_asset }}" alt="{{ $intro->ds_titulo }}">
                        </td>
                        <td>
                            <div class="media-body">
                                <p>{{ $intro->ds_titulo }}</p>
                            </div>
                        </td>
                        <td>
                            {{ $intro->dt_de }}
                        </td>
                        <td>
                            {{ $intro->dt_ate }}
                        </td>
                        <td class="text-center">
                            @can('intro.update')
                                <a class="text-dark link-icon" href="{{ route('admin.intro.edit', ['intro' => $intro->id]) }}">
                                    <i class="fas fa-edit fa-2x"></i>
                                </a>
                            @endcan
                            @cannot('intro.update')
                                <i class="fas fa-edit fa-2x"></i>
                            @endcannot
                        </td>
                        <td class="text-center">
                            @can('intro.delete')
                                <a class="text-danger" href="#" data-toggle="modal" data-target="#deleteIntroModal" data-whatever="{{ $intro->id }}">
                                    <i class="fas fa-trash-alt fa-2x"></i>
                                </a>
                            @endcan
                            @cannot('intro.delete')
                            <i class="fas fa-trash-alt fa-2x"></i>
                            @endcannot
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    @component('admin.components._confirm_delete_component')
        @slot('idModal')
            deleteIntroModal
        @endslot
        @slot('openForm')
            {{ Form::open(['route' => ['admin.intro.destroy', 'intro'], 'method' => 'DELETE']) }}
            {{ Form::hidden('redirects_to', URL::full()) }}
            {{ Form::hidden('id_intro', null, ['class' => 'form-control', 'id' => 'id-intro']) }}
        @endslot
        @slot('title')
            Excluir Intro?
        @endslot
    @endcomponent

@endsection()
