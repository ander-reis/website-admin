@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1>Owl Carousel</h1>

            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Ícone</th>
                    <th>Título</th>
                    <th>Link</th>
                    <th>Editar</th>
                </tr>
                </thead>
                <tbody>
                @foreach($owlItems as $owlItem)
                    <tr>
                        <td>{{ $owlItem->id }}</td>
                        <td>{!! $owlItem->ds_icone !!}</td>
                        <td>{!! $owlItem->ds_titulo !!}</td>
                        <td>{{ $owlItem->ds_link }}</td>
                        <td>
                            <a class="text-dark" href="{{ route('admin.owl-carousel.edit', ['owl_carousel' => $owlItem->id]) }}">
                                <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection()