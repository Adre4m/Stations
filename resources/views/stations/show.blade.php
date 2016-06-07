@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">({{ $station->code }}) {{ $station->name }}</div>
                    <div class="panel-body">
                        Manager : {{ \App\Models\Contributor::findOrFail($station->manager_id)->fullname }}<br>
                        Owner : {{ \App\Models\Contributor::findOrFail($station->owner_id)->fullname }}<br>
                        Business key : {{ $station->business_key }}
                    </div>
                    @if($station->networks->count())
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="panel panel-default">
                                    <div class="panel-heading">{{ trans('networks.title') }}</div>
                                    @foreach($station->networks as $network)
                                        @include('networks.show', $network)
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection