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

<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    <div class="col-md-4 control-label">
        <span class="fileUpload btn btn-success">{{ trans('pagination.upload') }}
            {!! Form::file($name,
            ['accept' => '.xml,.csv,.txt', 'class' => 'upload form-control', 'id' => $name,]) !!}
        </span>
    </div>
    <div class="col-md-6">
        <input id="uploadFile" placeholder="Choose File" disabled="disabled" class="form-control form-control-static"/>
        {!! Form::errors($name) !!}
    </div>
</div>
<script type="text/javascript">
    document.getElementById("{{ $name }}").onchange = function () {
        document.getElementById("uploadFile").value = this.value;
    };
</script>