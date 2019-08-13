@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="my-3">
                <h1>Slider</h1>
            </div>
            <p>
                <a href="{{ route('admin.slider.create') }}" class="btn btn-outline-primary mr-2 mt-2 mb-2">Cadastrar Slider</a>
            </p>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Imagem</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Link</th>
                    <th scope="col" class="text-center">Ativo</th>
                    <th scope="col" class="text-center">Editar</th>
                    <th scope="col" class="text-center">Excluir</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sliders as $slider)
                    <tr>
                        <td>{{ $slider->id }}</td>
                        <td>
                            <img class="rounded" src="{{ $slider->thumb_small_asset }}" alt="{{ $slider->ds_titulo }}">
                        </td>
                        <td>
                            <div class="media-body">
                                <h4 class="media-heading">{{ $slider->ds_label }}</h4>
                                <p>{{ $slider->ds_titulo }}</p>
                            </div>
                        </td>
                        <td>
                            {{ $slider->ds_link }}
                        </td>
                        <td class="text-center">
                            {!! flStatus($slider->fl_ativo) !!}
                        </td>
                        <td class="text-center">
                            <a class="text-dark link-icon" href="{{ route('admin.slider.edit', ['slider' => $slider->id]) }}">
                                <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a class="text-danger" href="#" data-toggle="modal" data-target="#deleteSliderModal" data-whatever="{{ $slider->id }}">
                                <i class="fa fa-trash-o fa-2x" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    @component('admin.components._confirm_delete_component')
        @slot('idModal')
            deleteSliderModal
        @endslot
        @slot('openForm')
            {{ Form::open(['route' => ['admin.slider.destroy', 'slider'], 'method' => 'DELETE']) }}
            {{ Form::hidden('redirects_to', URL::full()) }}
            {{ Form::hidden('id_slider', null, ['class' => 'form-control', 'id' => 'id-slider']) }}
        @endslot
        @slot('title')
            Excluir Slider?
        @endslot
    @endcomponent

@endsection()
