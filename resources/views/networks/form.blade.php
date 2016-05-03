{!! Form::model($network, ['route' => ($network->exists) ? ["networks.update", $network->id] :  'networks.store']) !!}
{!! Form::token() !!}

<div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
    {!! Form::label('code', trans('networks.set_code')) !!}
    <div class="col-md-6">
        {!! Form::text('code') !!}<br>
        @if ($errors->has('code'))
            <span class="help-block">
                <strong>{{ $errors->first('code') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', trans('networks.set_name')) !!}
    <div class="col-md-6">
        {!! Form::text('name') !!}<br>
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit(trans('networks.confirm')) !!}
        <a href="{{ route('networks.index') }}">
            {!! Form::button(trans('networks.cancel')) !!}
        </a>
    </div>
</div>

{!! Form::close() !!}