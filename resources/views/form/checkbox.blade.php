<!--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">-->
<!--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">-->

<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    {!! Form::label($name, trans("validation.attributes.{$name}"), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6 checkbox checkbox-default">
        {!! Form::checkbox($name, $value, array_merge(['class' => 'form-control'], $attributes)) !!}
        {!! Form::errors($name) !!}
    </div>
</div>