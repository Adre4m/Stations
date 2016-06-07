@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('contributors.title') }}
                    </div>
                    <div class="panel-body">
                        <a href="{{ route('contributors.index') }}">
                            <button class="btn btn-default">
                                {{ trans('contributors.cancel') }}
                            </button>
                        </a>
                        @foreach($messages as $message)
                            <div>
                                <div class="alert alert-{{ (count($message[1]['errors']) != 0) ? "danger" : "success"  }}">
                                    <strong>Station : </strong>
                                    <ul>
                                        <li>{{ trans('validation.attributes.contributor-code') }}
                                            : {{ $message[0]->code }}</li>
                                        <li>{{ trans('validation.attributes.contributor-name') }}
                                            : {{ $message[0]->name }}</li>
                                        <li>{{ trans('validation.attributes.contributor-last_name') }}
                                            : {{ $message[0]->last_name }}</li>
                                        <li>{{ trans('validation.attributes.contributor-siret') }}
                                            : {{ $message[0]->siret }}</li>
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