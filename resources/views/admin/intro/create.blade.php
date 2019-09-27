@extends('layouts.admin')

@section('content')
    <div class="col-md-12">
        <div class="my-3">
            <h1>Cadastrar Imagem Intro</h1>
        </div>

        {{ Form::open(['route' => 'admin.intro.store', 'id' => 'formIntro', 'files' => true]) }}

        @include('admin.intro._form')

        <button type="submit" class="btn btn-primary">Salvar</button>

        <a href="{{ route('admin.intro.index') }}" class="button btn btn-danger">Voltar</a>

        {{ Form::close() }}
    </div>
@endsection()
