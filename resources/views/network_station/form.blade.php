{!! Form::model($station_network, [
    'route' => ($station_network->exists) ?
        ["network_station", $station_network->id] :
        'network_station',
    'class' => 'form-horizontal'])
!!}
{!! Form::token() !!}

{!! Form::globalSelect('network_station-station_id', $stations->pluck('name', 'id'), null) !!}
{!! Form::globalSelect('network_station-network_id', $networks->pluck('name', 'id'), null) !!}
{!! Form::globalDate('network_station-began_at') !!}
{!! Form::globalDate('network_station-end_at') !!}

{!! Form::buttons('network_station') !!}

{!! Form::close() !!}