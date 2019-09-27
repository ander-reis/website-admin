@extends('layouts.admin')

@section('content')
    <div class="col-md-12">
        <div class="my-3">
            <h1>Cadastrar Slider</h1>
        </div>

        {{ Form::open(['route' => 'admin.slider.store', 'id' => 'formSlider', 'files' => true]) }}

        @include('admin.slider._form')

        <button type="submit" class="btn btn-primary">Salvar</button>

        <a href="{{ route('admin.slider.index') }}" class="button btn btn-danger">Voltar</a>

        {{ Form::close() }}
    </div>
@endsection()
