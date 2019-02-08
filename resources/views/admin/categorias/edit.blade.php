@extends('layouts.admin')

@section('content')
    <div class="col-md-12">
        <div class="my-3">
            <h1>Editar Categoria</h1>
        </div>

        @component('admin.components._alert_error')
            {{Session::get('error-message')}}
        @endcomponent

        {{ Form::model($categorias, ['route' => ['admin.categorias.update', $categorias->id_categoria], 'method' => 'PUT']) }}

        @include('admin.categorias._form')

        <button type="submit" class="btn btn-primary">Editar</button>

        {{ Form::close() }}
    </div>
@endsection()
