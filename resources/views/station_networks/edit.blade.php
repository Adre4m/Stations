@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('station_networks.title') }}</div>
                <div class="panel-body">
                    @include('station_networks.form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection