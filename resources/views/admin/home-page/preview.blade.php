@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>Preview</h1>
        <div>
            <a href="javascript:history.go(-1)" class="btn btn-danger" title="Return to the previous page">&laquo; Fuck YOU</a>
        </div>

        <div>
            @foreach($noticias as $key => $item)
                <p>{{ $item['ds_categoria'] }}</p>
                <p>{{ $item['ds_titulo'] }}</p>
            @endforeach
        </div>

    </div>
@endsection()
