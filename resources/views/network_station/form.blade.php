{!! Form::model($network_station, [
    'route' => ($network_station->exists) ?
        ["network_station.update", $network_station->id] :
        'network_station.create',
    'class' => 'form-horizontal'])
!!}
{!! Form::token() !!}

{!! Form::globalSelect('network_station-station_id', $stations->pluck('name', 'id'), null) !!}
{!! Form::globalSelect('network_station-network_id', $networks->pluck('name', 'id'), null) !!}
{!! Form::globalDate('network_station-began_at', \Carbon\Carbon::now('Europe/Paris')) !!}
{!! Form::globalDate('network_station-end_at') !!}

{!! Form::buttons('network_station') !!}

{!! Form::close() !!}