@extends('layouts.admin')

@section('content')
    <div class="col-md-12">
        <div class="my-3">
            <h1>Editar Imagem Intro</h1>
        </div>

        {{ Form::model($intro, ['route' => ['admin.intro.update', $intro->id], 'id' => 'formIntro', 'files' => true, 'method' => 'PUT']) }}

        @include('admin.intro._form')

        <button type="submit" class="btn btn-primary">Salvar</button>

        <a href="{{ route('admin.intro.index') }}" class="button btn btn-danger">Voltar</a>

        {{ Form::close() }}
    </div>
@endsection()
