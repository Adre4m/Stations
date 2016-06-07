@extends('layouts.app')

@section('content')
    {!! Html::preview('contributors', $messages) !!}
@endsection