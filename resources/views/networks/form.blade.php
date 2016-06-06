{!! Form::model($network, [
    'route' => ($network->exists) ? ["networks.update", $network->id] :  'networks.store',
    'class' => 'form-horizontal'])
!!}
{!! Form::token() !!}

{!! Form::globalText('network-code') !!}
{!! Form::globalText('network-name') !!}
{!! Form::buttons('networks') !!}

{!! Form::close() !!}