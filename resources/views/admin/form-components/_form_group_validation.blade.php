<section class="row">
<div class="col-12">
    <h3>{{$title}}</h3>
    <hr>
</div>
<div class="col-6">
    <div class="form-group">
        {{$block_one}}
    </div>
</div>
<div class="col-6">
    <div class="form-group">
        {{$block_two}}
    </div>
</div>
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
</section>
