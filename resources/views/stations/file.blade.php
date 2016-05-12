@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('stations.title') }}</div>
                    <div class="panel-body">
                        {!! Form::model([
                            'route' => 'stations.store',
                            'class' => 'form-horizontal'])
                        !!}
                        {!! Form::token() !!}
                        {!! Form::globalFile('station-file') !!}
                        {!! Form::buttons('stations') !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection