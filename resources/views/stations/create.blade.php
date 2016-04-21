@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Stations</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('stations.store') }}">
                        {!! csrf_field() !!}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">{{ trans('stations.set_name') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">

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
                                <input type="number" step="0.0001" class="form-control" name="x" value="{{ old('x') }}">

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
                                <input type="number" step="0.0001" class="form-control form-control-static" name="y" value="{{ old('y') }}">

                                @if ($errors->has('y'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('y') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- TODO: Le contributor_id doit être une liste deroullante-->
                        <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">{{ trans('stations.set_contributor') }}</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control" name="id" value="{{ old('id') }}">

                                @if ($errors->has('id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-btn fa-plus"></i>{{ trans('stations.add') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection