<div class="form-group {{ $class }} {{$errors->has($field) ?' has-error' : ''}}">
    {{ $slot }}
    @include('admin.form-components._help_block',['field' => $field])
</div>
