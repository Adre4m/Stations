{!! Form::model($station_network, [
    'route' => ($station_network->exists) ?
        ["station_networks.update", $station_network->id] :
        'station_networks.store',
    'class' => 'form-horizontal'])
!!}
{!! Form::token() !!}

{!! Form::globalSelect('station_networks-station_id', $stations->pluck('name', 'id'), null) !!}
{!! Form::globalSelect('station_networks-network_id', $networks->pluck('name', 'id'), null) !!}
{!! Form::globalDate('station_networks-began_at') !!}
{!! Form::globalDate('station_networks-end_at') !!}

{!! Form::buttons('station_networks') !!}

{!! Form::close() !!}