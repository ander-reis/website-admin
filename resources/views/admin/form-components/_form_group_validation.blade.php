<section class="card mb-2">
    <div class="row">
        <div class="col-12">
            <div class="card-header text-center">
                <h3>{{$title}}</h3>
            </div>
        </div>
        <div class="card-body row">
            @if(isset($block_one))
            <div class="col-6">
                <div class="form-group">
                    {{$block_one}}
                </div>
            </div>
            @endif
            @if(isset($block_two))
            <div class="col-6">
                <div class="form-group">
                    {{$block_two}}
                </div>
            </div>
            @endif
            @if(isset($block_three) or isset($block_four))
            <div class="col-12 no-gutters">
                @if(isset($block_three))
                <div class="form-group">
                    {{$block_three}}
                </div>
                @endif
                @if(isset($block_four))
                <div class="form-group">
                    {{$block_four}}
                </div>
                @endif
            </div>
            @endif
        </div>
    </div>
</section>
