{!! Form::model($station, ['route' => ($station->exists) ? ["stations.update", $station->code] :  'stations.store', 'class' => 'form-horizontal']) !!}
{!! Form::token() !!}

{!! Form::stationText('code', old('code')) !!}
{!! Form::stationText('name', old('name')) !!}
{!! Form::stationText('x', old('x')) !!}
{!! Form::stationText('y', old('y')) !!}
{!! Form::stationSelect('manager_id', old('manager_id'), ['contributors' => $contributors]) !!}
{!! Form::stationSelect('owner_id', old('owner_id'), ['contributors' => $contributors]) !!}

@if($station->exists)
    <div class="form-group{{ $errors->has('msg') ? ' has-error' : '' }}">
        {!! Form::label('msg', trans('stations.log')) !!}
        <div class="col-md-6">
            {!! Form::textarea('msg') !!}<br>
            @if ($errors->has('msg'))
                <span class="help-block">
                <strong>{{ $errors->first('msg') }}</strong>
            </span>
            @endif
        </div>
    </div>
@endif

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit(trans('stations.confirm')) !!}
        <a href="{{ route('stations.index') }}">
            {!! Form::button(trans('stations.cancel')) !!}
        </a>
    </div>
</div>

{!! Form::close() !!}