{!! Form::model($station, [
    'route' => ($station->exists) ? ["stations.update", $station->code] :  'stations.store',
    'class' => 'form-horizontal'])
!!}
{!! Form::token() !!}

{!! Form::globalText('station-code') !!}
{!! Form::globalText('station-name') !!}
{!! Form::globalText('station-x') !!}
{!! Form::globalText('station-y') !!}
{!! Form::globalSelect('station-manager_id', $contributors->pluck('fullname', 'id')) !!}
{!! Form::globalSelect('station-owner_id', $contributors->pluck('fullname', 'id')) !!}
{!! Form::buttons('stations') !!}

{!! Form::close() !!}