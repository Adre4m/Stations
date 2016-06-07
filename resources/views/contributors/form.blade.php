{!! Form::model($contributor, [
    'route' => ($contributor->exists) ? ["contributors.update", $contributor->id] :  'contributors.store',
    'class' => 'form-horizontal'])
!!}
{!! Form::token() !!}

{!! Form::globalText('contributor-code') !!}
{!! Form::globalText('contributor-name') !!}
{!! Form::globalText('contributor-last_name') !!}
{!! Form::globalText('contributor-siret') !!}
{!! Form::buttons('contributors') !!}

{!! Form::close() !!}