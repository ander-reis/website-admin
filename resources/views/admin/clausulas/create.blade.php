@extends('layouts.admin')

@section('content')
    <div class="col-md-12">
        <div class="my-3">
            <h1>Cadastrar Cláusula</h1>
            <p>Convenção Coletiva: <b>{{ $convencoes->ds_titulo }}</b></p>
        </div>

        {{ Form::model(null, ['route' => ['admin.convencao.clausulas.store', 'convencoes_entidade' => $convencoes->fl_entidade, $convencoes]]) }}

        @include('admin.clausulas._form')

        <button type="submit" class="btn btn-primary">Salvar</button>

        {{-- <a href="{{ route('admin.convencao.clausulas.index') }}" class="button btn btn-danger">Voltar</a> --}}

        {{ Form::close() }}

    </div>
@endsection()
