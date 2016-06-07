<style>
    .fileUpload {
        position: relative;
        overflow: hidden;
        /*margin: 10px;*/
    }

    .fileUpload input.upload {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
    }
</style>
{!! Form::open(['route' => "$name.store", 'files' => true]) !!}
{!! Form::token() !!}
<span class="fileUpload btn btn-success">
    <i class="fa fa-btn fa-download"></i>{{ trans('pagination.upload') }}
    <input name="{{ $value }}" id="{{ $value }}" accept=".xml,.csv" type="file" class="upload form-control" onchange="submit()"/>
</span>
{!! Form::close() !!}