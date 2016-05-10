{!! Form::model($sample_site, [
    'route' => ($sample_site->exists) ? ["sample_sites.update", $sample_site->id] :  'sample_sites.store',
    'class' => 'form-horizontal'])
!!}
{!! Form::token() !!}

{!! Form::globalText('sample_site-code') !!}
{!! Form::globalText('sample_site-name') !!}
{!! Form::globalText('sample_site-x') !!}
{!! Form::globalText('sample_site-y') !!}
{!! Form::globalSelect('sample_site-station_id', $stations->pluck('name', 'id')) !!}
{!! Form::buttons('sample_sites') !!}

{!! Form::close() !!}