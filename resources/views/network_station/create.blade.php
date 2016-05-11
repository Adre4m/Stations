@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('network_station.title') }}</div>
                <div class="panel-body">
                    @include('network_station.form', ['network_station' => new \App\Models\NetworkStation])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection