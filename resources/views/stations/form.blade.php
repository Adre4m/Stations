{!! Form::model($station, ['route' => ($station->exists) ? ["stations.update", $station->code] :  'stations.store']) !!}
{!! Form::token() !!}

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', trans('stations.set_name')) !!}
    {!! Form::text('name') !!}<br>
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('x') ? ' has-error' : '' }}">
    {!! Form::label('x', trans('stations.set_x')) !!}
    {!! Form::text('x') !!}<br>
    @if ($errors->has('x'))
        <span class="help-block">
            <strong>{{ $errors->first('x') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('y') ? ' has-error' : '' }}">
    {!! Form::label('y', trans('stations.set_y')) !!}
    {!! Form::text('y') !!}<br>
    @if ($errors->has('y'))
        <span class="help-block">
            <strong>{{ $errors->first('y') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('manager_id') ? ' has-error' : '' }}">
    {!! Form::label('manager_id', trans('stations.set_manager')) !!}
    {!! Form::select('manager_id', $contributors->pluck('fullname', 'id')) !!}<br>
    @if ($errors->has('manager_id'))
        <span class="help-block">
            <strong>{{ $errors->first('manager_id') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('owner_id') ? ' has-error' : '' }}">
    {!! Form::label('owner_id', trans('stations.set_owner')) !!}
    {!! Form::select('owner_id', $contributors->pluck('fullname', 'id')) !!}<br>
    @if ($errors->has('owner_id'))
        <span class="help-block">
            <strong>{{ $errors->first('owner_id') }}</strong>
        </span>
    @endif
</div>

@if($station->exists)
    <div class="form-group{{ $errors->has('msg') ? ' has-error' : '' }}">
        {!! Form::label('msg', trans('stations.log')) !!}
        {!! Form::textarea('msg') !!}<br>
        @if ($errors->has('msg'))
            <span class="help-block">
            <strong>{{ $errors->first('msg') }}</strong>
        </span>
        @endif
    </div>
@endif

{!! Form::submit(trans('stations.confirm')) !!}
<a href="{{ route('stations.index') }}">
    {!! Form::button(trans('stations.cancel')) !!}
</a>

{!! Form::close() !!}