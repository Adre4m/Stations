@extends('layouts.app')

@section('content')
    {!! Html::renderImport("contributors", $messages) !!}
@endsection