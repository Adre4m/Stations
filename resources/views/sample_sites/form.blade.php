{!! Form::model($sample_site, ['route' => ($sample_site->exists) ? ["sample_sites.update", $sample_site->id] :  'sample_sites.store']) !!}
{!! Form::token() !!}

<div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
    {!! Form::label('code', trans('sample_sites.set_code')) !!}
    <div class="col-md-6">
        {!! Form::text('code') !!}
        @if ($errors->has('code'))
            <div class="alert alert-danger">
                @foreach($errors->get('code') as $error)
                    <strong>{{ $error }}</strong><br>
                @endforeach
            </div>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', trans('sample_sites.set_name')) !!}
    <div class="col-md-6">
        {!! Form::text('name') !!}
        @if ($errors->has('name'))
            <div class="alert alert-danger">
                @foreach($errors->get('name') as $error)
                    <strong>{{ $error }}</strong><br>
                @endforeach
            </div>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('x') ? ' has-error' : '' }}">
    {!! Form::label('x', trans('sample_sites.set_x')) !!}
    <div class="col-md-6">
        {!! Form::text('x') !!}
        @if ($errors->has('x'))
            <div class="alert alert-danger">
                @foreach($errors->get('x') as $error)
                    <strong>{{ $error }}</strong><br>
                @endforeach
            </div>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('y') ? ' has-error' : '' }}">
    {!! Form::label('y', trans('sample_sites.set_y')) !!}
    <div class="col-md-6">
        {!! Form::text('y') !!}
        @if ($errors->has('y'))
            <div class="alert alert-danger">
                @foreach($errors->get('y') as $error)
                    <strong>{{ $error }}</strong><br>
                @endforeach
            </div>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('station_id') ? ' has-error' : '' }}">
    {!! Form::label('station_id', trans('sample_sites.set_station')) !!}
    <div class="col-md-6">
        {!! Form::select('station_id', $stations->pluck('name', 'id')) !!}
        @if ($errors->has('station_id'))
            <div class="alert alert-danger">
                @foreach($errors->get('station_id') as $error)
                    <strong>{{ $error }}</strong><br>
                @endforeach
            </div>
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