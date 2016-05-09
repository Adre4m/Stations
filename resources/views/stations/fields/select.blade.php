<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    {!! Form::label($name, trans("stations.set_{$name}"), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select($name, $attributes['contributors']->pluck('fullname', 'id'), $value, array_merge(['class' => 'form-control'], $attributes)) !!}
        @if ($errors->has($name))
            <span class="alert alert-danger">
                @foreach($errors->get($name) as $error)
                    {{ $error }}
                @endforeach
            </span>
        @endif
    </div>
</div>