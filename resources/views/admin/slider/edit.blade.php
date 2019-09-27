@extends('layouts.admin')

@section('content')
    <div class="col-md-12">
        <div class="my-3">
            <h1>Editar Slider</h1>
        </div>

        {{ Form::model($slider, ['route' => ['admin.slider.update', $slider->id], 'id' => 'formSlider', 'files' => true, 'method' => 'PUT']) }}

        @include('admin.slider._form')

        <button type="submit" class="btn btn-primary">Salvar</button>

        <a href="{{ route('admin.slider.index') }}" class="button btn btn-danger">Voltar</a>

        {{ Form::close() }}
    </div>
@endsection()
