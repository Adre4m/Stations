@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('contributors.title') }}</div>
                    <div class="panel-body">
                        @can('add', new App\Models\Contributor)
                            <a href="{{ route('contributors.create') }}">
                                <button class="btn btn-primary">
                                    <i class="fa fa-btn fa-plus"></i>{{ trans('contributors.add') }}
                                </button>
                            </a>
                        @elsecan
                            <button class="btn btn-default" style="background-color: #aeaeae; color: #5e5e5e">
                                <i class="fa fa-btn fa-plus"></i>{{ trans('contributors.add') }}
                            </button>
                        @endcan
                        {!! Html::exports('contributors') !!}
                        {!! Html::import('contributors', 'contributor-file') !!}
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