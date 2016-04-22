@extends('layouts.app')

@section('content')
    {!! Form::model($station, ['route' => 'stations.store']) !!}
    {!! Form::token() !!}

    {!! Form::label('name', trans('stations.set_name')) !!}
    {!! Form::text('name') !!}<br>

    {!! Form::label('x', trans('stations.set_x')) !!}
    {!! Form::number('x') !!}<br>

    {!! Form::label('y', trans('stations.set_y')) !!}
    {!! Form::number('y') !!}<br>

    {!! Form::label('contributor_id', trans('stations.set_contributor')) !!}
    {!! Form::select('contributor_id', $contributors->pluck('fullname', 'id')) !!}<br>

    @if($station->exists)
        {!! Form::textarea('msg') !!}
    @endif

    {!! Form::submit(trans('stations.confirm')) !!}
    <a href="{{ route('stations.index') }}">
        {!! Form::button(trans('stations.cancel')) !!}
    </a>

    {!! Form::close() !!}
@endsection