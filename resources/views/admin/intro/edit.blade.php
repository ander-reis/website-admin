@extends('layouts.admin')

@section('content')
    <div class="col-md-12">
        <div class="my-3">
            <h1>Editar Imagem Intro</h1>
        </div>

        <p>
            <img src="{{ $intro->thumb_small_asset }}" alt="{{ $intro->ds_titulo }}">
        </p>

        {{ Form::model($intro, ['route' => ['admin.intro.update', $intro->id], 'files' => true, 'method' => 'PUT']) }}

        @include('admin.intro._form')

        <button type="submit" class="btn btn-primary">Salvar</button>

        {{ Form::close() }}
    </div>
@endsection()
