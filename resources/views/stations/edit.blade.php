@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('stations.title') }}</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('stations.update', [$station]) }}">
                        {!! csrf_field() !!}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">{{ trans('stations.set_name') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{$station->name}}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('x') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">{{ trans('stations.set_x') }}</label>

                            <div class="col-md-6">
                                <input type="number" step="0.000001" class="form-control" name="x" value="{{ $station->x }}">

                                @if ($errors->has('x'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('x') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('y') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">{{ trans('stations.set_y') }}</label>

                            <div class="col-md-6">
                                <input type="number" step="0.000001" class="form-control form-control-static" name="y" value="{{ $station->y }}">

                                @if ($errors->has('y'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('y') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('contributor_id') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">{{ trans('stations.set_contributor') }}</label>
                            <div class="col-md-6">
                                <select name="contributor_id" class="form-control">
                                    @foreach($contributors as $contributor)
                                        <option value="{{ $contributor->id }}">{{ $contributor->name }} {{ $contributor->last_name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('contributor_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contributor_id') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('msg') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">{{ trans('stations.set_msg') }}</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="msg"></textarea>
                                @if ($errors->has('msg'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('msg') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button class="btn btn-success" type="submit">
                                    <i class="fa fa-btn fa-edit"></i>{{ trans('stations.agree') }}
                                </button>
                                <a href="{{ route('stations.index') }}">
                                    <button type="button" class="btn btn-default">
                                        {{ trans('stations.cancel') }}
                                    </button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection