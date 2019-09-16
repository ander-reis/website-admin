@extends('layouts.admin')

@section('content')
    <div class="col-md-12">
        <div class="my-3">
            <h1>Cadastrar Categoria</h1>
        </div>

        {{ Form::open(['route' => 'admin.noticias-categoria.store']) }}

        @include('admin.noticias-categoria._form')

        <button type="submit" class="btn btn-primary">Cadastrar</button>

        {{ Form::close() }}
    </div>
@endsection()
