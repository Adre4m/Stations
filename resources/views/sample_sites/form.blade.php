{!! Form::model($sample_site, ['route' => ($sample_site->exists) ? ["sample_sites.update", $sample_site->id] :  'sample_sites.store']) !!}
{!! Form::token() !!}

<div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
    {!! Form::label('code', trans('sample_sites.set_code')) !!}
    <div class="col-md-6">
        {!! Form::text('code') !!}<br>
        @if ($errors->has('code'))
            <span class="help-block">
                <strong>{{ $errors->first('code') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', trans('sample_sites.set_name')) !!}
    <div class="col-md-6">
        {!! Form::text('name') !!}<br>
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('x') ? ' has-error' : '' }}">
    {!! Form::label('x', trans('sample_sites.set_x')) !!}
    <div class="col-md-6">
        {!! Form::text('x') !!}<br>
        @if ($errors->has('x'))
            <span class="help-block">
                <strong>{{ $errors->first('x') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('y') ? ' has-error' : '' }}">
    {!! Form::label('y', trans('sample_sites.set_y')) !!}
    <div class="col-md-6">
        {!! Form::text('y') !!}<br>
        @if ($errors->has('y'))
            <span class="help-block">
                <strong>{{ $errors->first('y') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('station_id') ? ' has-error' : '' }}">
    {!! Form::label('station_id', trans('sample_sites.set_station')) !!}
    <div class="col-md-6">
        {!! Form::select('station_id', $stations->pluck('name', 'code')) !!}<br>
        @if ($errors->has('station_id'))
            <span class="help-block">
                <strong>{{ $errors->first('station_id') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit(trans('sample_sites.confirm')) !!}
        <a href="{{ route('sample_sites.index') }}">
            {!! Form::button(trans('sample_sites.cancel')) !!}
        </a>
    </div>
</div>

{!! Form::close() !!}