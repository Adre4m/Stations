{!! Form::model($contributor, [
    'route' => ($contributor->exists) ? ["contributors.update", $contributor->id] :  'contributors.store',
    'class' => 'form-horizontal',
    'files' => true])
!!}
{!! Form::token() !!}

{!! Form::globalText('contributor-code') !!}
{!! Form::globalText('contributor-name') !!}
{!! Form::globalText('contributor-last_name') !!}
{!! Form::globalCheckbox('contributor-siret') !!}
{!! Form::import('contributor-file') !!}
{!! Form::buttons('contributors') !!}

{!! Form::close() !!}