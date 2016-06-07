<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit(trans("{$name}.confirm"), ['class' => 'btn btn-primary']) !!}
        <a href="{{ route("{$name}.index") }}">
            {!! Form::button(trans("{$name}.cancel"), ['class' => 'btn btn-default']) !!}
        </a>
    </div>
</div>