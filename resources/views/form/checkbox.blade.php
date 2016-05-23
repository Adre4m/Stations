<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    {!! Form::label($name, trans("validation.attributes.{$name}"), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::checkbox($name, $value, array_merge(['class' => 'form-control'], $attributes)) !!}
        @if ($errors->has($name))
            <div class="alert alert-danger">
                @foreach($errors->get($name) as $error)
                     <strong>{{ $error }}</strong>
                @endforeach
            </div>
        @endif
    </div>
</div>