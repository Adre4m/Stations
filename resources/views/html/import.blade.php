@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans("$name.title") }}
                    </div>
                    <div class="panel-body">
                        <a href="{{ route("$name.index") }}">
                            <button class="btn btn-default">
                                {{ trans("$name.cancel") }}
                            </button>
                        </a>
                        @foreach($value as $message)
                            <div>
                                <div class="alert alert-{{ (count($message[1]['errors']) != 0) ? "danger" : "success"  }}">
                                    <strong>Station : </strong>
                                    <ul>
                                        @foreach($message[0]->toArray() as $key => $value)
                                            @if($key != 'id' && $key != 'uuid' && $key != 'created_at' && $key != 'updated_at')
                                                <li>
                                                    {{ trans("validation.attributes.".str_singular($name)."-{$key}") }}
                                                    : {{ $value }}
                                                </li>
                                            @endif
                                        @endforeach
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
                                            <div>
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