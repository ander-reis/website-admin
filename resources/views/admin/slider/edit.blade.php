@extends('layouts.admin')

@section('content')
    <div class="col-md-12">
        <div class="my-3">
            <h1>Editar Slider</h1>
        </div>

        <p>
            <img src="{{ $slider->thumb_small_asset }}" alt="{{ $slider->ds_titulo }}">
        </p>

        {{ Form::model($slider, ['route' => ['admin.slider.update', $slider->id], 'files' => true, 'method' => 'PUT']) }}

        @include('admin.slider._form')

        <button type="submit" class="btn btn-primary">Editar</button>

        {{ Form::close() }}
    </div>
@endsection()
