@extends('layouts.admin')

@section('content')
    <div class="col-md-12">
        <div class="my-3">
            <h1>Cadastrar Imagem Intro</h1>
        </div>

        {{ Form::open(['route' => 'admin.intro.store', 'files' => true]) }}

        @include('admin.intro._form')

        <button type="submit" class="btn btn-primary">Salvar</button>

        {{ Form::close() }}
    </div>
@endsection()
