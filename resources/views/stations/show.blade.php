@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">({{ $station->code }}) {{ $station->name }}</div>
                    <div class="panel-body">
                        Manager : {{ \App\Models\Contributor::findOrFail($station->manager_id)->fullname }}<br>
                        Owner : {{ \App\Models\Contributor::findOrFail($station->owner_id)->fullname }}<br>
                        Business key : {{ $station->business_key }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!--DataTables-->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css" type="text/css">
    <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js" type="text/javascript"></script>
    {{--{!! $dataTable->scripts() !!}--}}
@endpush