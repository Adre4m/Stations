{!! Form::model($station, [
    'route' => ($station->exists) ? ["stations.update", $station->code] :  'stations.store',
    'class' => 'form-horizontal'])
!!}
{!! Form::token() !!}
{!! Form::globalText('station-code', $station->code) !!}
{!! Form::globalText('station-name', $station->name) !!}
{!! Form::globalText('station-x', $station->x) !!}
{!! Form::globalText('station-y', $station->y) !!}
{!! Form::globalSelect('station-manager_id', $contributors->pluck('fullname', 'id'), $station->manager_id) !!}
{!! Form::globalSelect('station-owner_id', $contributors->pluck('fullname', 'id'), $station->owner_id) !!}
{!! Form::buttons('stations') !!}

{!! Form::close() !!}