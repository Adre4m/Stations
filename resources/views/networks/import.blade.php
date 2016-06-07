@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('networks.title') }}
                    </div>
                    <div class="panel-body">
                        <a href="{{ route('networks.index') }}">
                            <button class="btn btn-default">
                                {{ trans('networks.cancel') }}
                            </button>
                        </a>
                        @foreach($messages as $message)
                            <div>
                                <div class="alert alert-{{ (count($message[1]['errors']) != 0) ? "danger" : "success"  }}">
                                    <strong>Station : </strong>
                                    <ul>
                                        <li>{{ trans('validation.attributes.network-code') }}
                                            : {{ $message[0]->code }}</li>
                                        <li>{{ trans('validation.attributes.network-name') }}
                                            : {{ $message[0]->name }}</li>
                                    </ul>
                                    @if(count($message[1]['info']) != 0
                                    || count($message[1]['warnings']) != 0
                                    || count($message[1]['errors']) != 0)
                                        @if(count($message[1]['info']) != 0)
                                            <div class="alert alert-info">
                                                <ul>
                                                    @foreach($message[1]['info']->all() as $var)
                                                        <li><strong>{{ $var }}</strong></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        @if(count($message[1]['warnings']) != 0)
                                            <div class="alert alert-warning">
                                                <ul>
                                                    @foreach($message[1]['warnings']->all() as $var)
                                                        <li><strong>{{ $var }}</strong></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        @if(count($message[1]['errors']) != 0)
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach($message[1]['errors']->all() as $var)
                                                        <li><strong>{{ $var }}</strong></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    @else
                                        {{ trans('validation.no_errors') }}
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection