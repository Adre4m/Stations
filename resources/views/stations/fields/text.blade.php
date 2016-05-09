<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    {!! Form::label($name, trans("stations.set_{$name}"), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text($name, $value, array_merge(['class' => 'form-control'], $attributes)) !!}
        @if ($errors->has($name))
            <div class="alert alert-danger">
                @foreach($errors->get($name) as $error)
                     <strong>{{ $error }}</strong>
                @endforeach
            </div>
        @endif
    </div>
</div>