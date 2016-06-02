{!! Form::model($network, [
    'route' => ($network->exists) ? ["networks.update", $network->id] :  'networks.store',
    'class' => 'form-horizontal',
    'files' => true])
!!}
{!! Form::token() !!}

{!! Form::globalText('network-code') !!}
{!! Form::globalText('network-name') !!}
{!! Form::import('network-file') !!}
{!! Form::buttons('networks') !!}

{!! Form::close() !!}