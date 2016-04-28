@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('stations.title') }}</div>
                    <div class="panel-body">
                        @can('add', new App\Models\Station)
                            <a href="{{ route('stations.create') }}">
                                <button class="btn btn-primary">
                                    <i class="fa fa-btn fa-plus"></i>{{ trans('stations.add') }}
                                </button>
                            </a>
                        @endcan
                        @cannot('add', new App\Models\Station)
                            <button class="btn btn-default" style="background-color: #aeaeae; color: #5e5e5e">
                                <i class="fa fa-btn fa-plus"></i>{{ trans('stations.add') }}
                            </button>
                        @endcannot
                        {!! $dataTable->table() !!}
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
    {!! $dataTable->scripts() !!}
@endpush