@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('networks.title') }}</div>
                <div class="panel-body">
                    @include('networks.form', ['network' => $network])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection