{!! Form::model($station_network, ['route' => ($station_network->exists) ? ["station_networks.update", $station_network->id] :  'station_networks.create']) !!}
{!! Form::token() !!}

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', trans('station_networks.set_name')) !!}
    <div class="col-md-6">
        {!! Form::text('name') !!}<br>
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('x') ? ' has-error' : '' }}">
    {!! Form::label('x', trans('station_networks.set_x')) !!}
    <div class="col-md-6">
        {!! Form::text('x') !!}<br>
        @if ($errors->has('x'))
            <span class="help-block">
                <strong>{{ $errors->first('x') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('y') ? ' has-error' : '' }}">
    {!! Form::label('y', trans('station_networks.set_y')) !!}
    <div class="col-md-6">
        {!! Form::text('y') !!}<br>
        @if ($errors->has('y'))
            <span class="help-block">
                <strong>{{ $errors->first('y') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('station_id') ? ' has-error' : '' }}">
    {!! Form::label('station_id', trans('station_networks.set_station')) !!}
    <div class="col-md-6">
        {!! Form::select('station_id', $stations->pluck('name', 'code')) !!}<br>
        @if ($errors->has('station_id'))
            <span class="help-block">
                <strong>{{ $errors->first('station_id') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit(trans('station_networks.confirm')) !!}
        <a href="{{ route('station_networks.index') }}">
            {!! Form::button(trans('station_networks.cancel')) !!}
        </a>
    </div>
</div>

{!! Form::close() !!}