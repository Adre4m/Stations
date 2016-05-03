{!! Form::model($station_network, ['route' => ($station_network->exists) ? ["station_networks.update", $station_network->id] :  'station_networks.store']) !!}
{!! Form::token() !!}

<div class="form-group{{ $errors->has('station_id') ? ' has-error' : '' }}">
    {!! Form::label('station_id', trans('station_networks.set_station')) !!}
    <div class="col-md-6">
        {!! Form::select('station_id', $stations->pluck('name', 'id')) !!}<br>
        @if ($errors->has('station_id'))
            <span class="help-block">
                <strong>{{ $errors->first('station_id') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('network_id') ? ' has-error' : '' }}">
    {!! Form::label('network_id', trans('station_networks.set_network')) !!}
    <div class="col-md-6">
        {!! Form::select('network_id', $networks->pluck('name', 'id')) !!}<br>
        @if ($errors->has('network_id'))
            <span class="help-block">
                <strong>{{ $errors->first('network_id') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('began_at') ? ' has-error' : '' }}">
    {!! Form::label('began_at', trans('station_networks.set_began')) !!}
    <div class="col-md-6">
        {!! Form::date('began_at', \Carbon\Carbon::now()) !!}<br>
        @if ($errors->has('began_at'))
            <span class="help-block">
                <strong>{{ $errors->first('began_at') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('end_at') ? ' has-error' : '' }}">
    {!! Form::label('end_at', trans('station_networks.set_end')) !!}
    <div class="col-md-6">
        {!! Form::date('end_at') !!}<br>
        @if ($errors->has('end_at'))
            <span class="help-block">
                <strong>{{ $errors->first('end_at') }}</strong>
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