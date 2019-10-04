@extends('layouts.admin')

@section('content')
    <div class="col-md-12">
        <div class="my-3">
            <h1>Cadastrar Convenção Coletiva</h1>
        </div>

        {{ Form::open(['route' => 'admin.convencao.store', 'files' => true]) }}

        @include('admin.convencoes._form')

        <button type="submit" class="btn btn-primary">Cadastrar</button>

        {{-- <a href="{{ route('admin.convencao.index') }}" class="button btn btn-danger">Voltar</a> --}}

        {{ Form::close() }}

    </div>
@endsection()
