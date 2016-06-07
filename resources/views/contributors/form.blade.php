{!! Form::model($contributor, [
    'route' => ($contributor->exists) ? ["contributors.update", $contributor->id] :  'contributors.store',
    'class' => 'form-horizontal'])
!!}
{!! Form::token() !!}

{!! Form::globalText('contributor-code', $contributor->code) !!}
{!! Form::globalText('contributor-name', $contributor->name) !!}
{!! Form::globalText('contributor-last_name', $contributor->last_name) !!}
{!! Form::buttons('contributors') !!}

{!! Form::close() !!}