{!! Form::model($network_station, [
    'route' => ($network_station->exists) ?
        ["network_station.update", $network_station->id] :
        'network_station.store',
    'class' => 'form-horizontal',
    'files' => true])
!!}
{!! Form::token() !!}

{!! Form::globalSelect('network_station-station_id', $stations->pluck('name', 'id'), null) !!}
{!! Form::globalSelect('network_station-network_id', $networks->pluck('name', 'id'), null) !!}
{!! Form::globalDate('network_station-began_at', \Carbon\Carbon::now('Europe/Paris')) !!}
{!! Form::globalDate('network_station-end_at') !!}
{!! Form::import('network_station-file') !!}

{!! Form::buttons('network_station') !!}

{!! Form::close() !!}