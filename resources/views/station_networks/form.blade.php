{!! Form::model($station_network, ['route' => ($station_network->exists) ? ["station_networks.update", $station_network->id] :  'station_networks.store']) !!}
{!! Form::token() !!}

<div class="form-group{{ $errors->has('station_id') ? ' has-error' : '' }}">
    {!! Form::label('station_id', trans('station_networks.set_station')) !!}
    <div class="col-md-6">
        {!! Form::select('station_id', $stations->pluck('name', 'id')) !!}
        @if ($errors->has('station_id'))
            <div class="alert alert-danger">
                @foreach($errors->get('station_id') as $error)
                    <strong>{{ $error }}</strong><br>
                @endforeach
            </div>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('network_id') ? ' has-error' : '' }}">
    {!! Form::label('network_id', trans('station_networks.set_network')) !!}
    <div class="col-md-6">
        {!! Form::select('network_id', $networks->pluck('name', 'id')) !!}
        @if ($errors->has('network_id'))
            <div class="alert alert-danger">
                @foreach($errors->get('network_id') as $error)
                    <strong>{{ $error }}</strong><br>
                @endforeach
            </div>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('began_at') ? ' has-error' : '' }}">
    {!! Form::label('began_at', trans('station_networks.set_began')) !!}
    <div class="col-md-6">
        {!! Form::dateTime('began_at', \Carbon\Carbon::now('Europe/Paris')) !!}
        @if ($errors->has('began_at'))
            <div class="alert alert-danger">
                @foreach($errors->get('began_at') as $error)
                    <strong>{{ $error }}</strong><br>
                @endforeach
            </div>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('end_at') ? ' has-error' : '' }}">
    {!! Form::label('end_at', trans('station_networks.set_end')) !!}
    <div class="col-md-6">
        {!! Form::date('end_at') !!}
        @if ($errors->has('end_at'))
            <div class="alert alert-danger">
                @foreach($errors->get('end_at') as $error)
                    <strong>{{ $error }}</strong><br>
                @endforeach
            </div>
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