{!! Form::model($contributor, ['route' => ($contributor->exists) ? ["contributors.update", $contributor->id] :  'contributors.store']) !!}
{!! Form::token() !!}

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', trans('contributors.set_name')) !!}
    <div class="col-md-6">
        {!! Form::text('name') !!}<br>
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
    {!! Form::label('last_name', trans('contributors.set_last_name')) !!}
    <div class="col-md-6">
        {!! Form::text('last_name') !!}<br>
        @if ($errors->has('last_name'))
            <span class="help-block">
                <strong>{{ $errors->first('last_name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit(trans('contributors.confirm')) !!}
        <a href="{{ route('contributors.index') }}">
            {!! Form::button(trans('contributors.cancel')) !!}
        </a>
    </div>
</div>

{!! Form::close() !!}