@extends('layouts.admin')

@section('content')
    <div class="col-md-12">
        <div class="my-3">
            <h1>Cadastrar Boletim</h1>
        </div>

        {{ Form::open(['route' => 'admin.boletim-cadastro.store']) }}

        @include('admin.boletim-cadastro._form')

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('admin.boletim-cadastro.index') }}" class="button btn btn-danger">Voltar</a>

        {{ Form::close() }}
    </div>
@endsection()
