<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    {!! Form::label($name, trans("validation.attributes.{$name}"), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select($name, $options, $value, array_merge(['class' => 'form-control'], $attributes)) !!}
        {!! Form::errors($name) !!}
    </div>
</div>