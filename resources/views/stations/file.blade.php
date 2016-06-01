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


<div class="form-group{{ $errors->has('station-file') ? ' has-error' : '' }}">
    <div class="col-md-4 control-label">
        <span class="fileUpload btn btn-success">{{ trans('pagination.upload') }}
            {!! Form::file('station-file',
            ['accept' => '.xml', 'class' => 'upload form-control', 'id' => 'station-file']) !!}
        </span>
    </div>
    <div class="col-md-6">
        <input id="uploadFile" placeholder="Choose File" disabled="disabled" class="form-control form-control-static"/>
        @if ($errors->has('station-file'))
            <div class="alert alert-danger">
                @foreach($errors->get('station-file') as $error)
                    <strong>{{ $error }}</strong><br>
                @endforeach
            </div>
        @endif
    </div>
</div>
<script type="text/javascript">
    document.getElementById("station-file").onchange = function () {
        document.getElementById("uploadFile").value = this.value;
    };
</script>