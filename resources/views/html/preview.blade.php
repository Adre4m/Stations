<div class="panel-body">
    <div>
        <strong>{{ trans('validation.preview.exceptions') }}</strong>
        <ul class="fa-ul">
            @if(isset($value['exceptions']) && count($value['exceptions']) != 0)
                @foreach($value['exceptions'] as $exception)
                    <li style="color:#cc0000">
                        <i class="fa-li fa fa-times-circle" aria-hidden="true"></i>
                        {{ $exception }}
                    </li>
                @endforeach
            @else
                <li style="color: #6cad49">
                    <i class="fa-li fa fa-check-circle"></i>
                    {{ trans('validation.preview.file_correct') }}
                </li>
            @endif
        </ul>
    </div>
    <div>
        <strong>{{ trans('validation.preview.msg') }}</strong>
        <ul class="fa-ul">
            @foreach($value['models'] as $model)
                <li style="color:{{ count($model[1]['errors']) != 0 ? '#cc0000' : '#6cad49' }}">
                    <i class="fa-li fa fa-{{ count($model[1]['errors']) != 0 ? 'times' : 'check' }}-circle"></i>
                    {{ trans("$name.title") }} :
                    @if(is_array($model[0]->business_key))
                        [
                        @foreach($model[0]->business_key as $key)
                            {{ $key }},
                        @endforeach
                        ]
                    @else
                        {{$model[0]->business_key}}
                    @endif
                    <span style="float:right">
                                        {{ count($model[1]['errors'])}} {{ trans('validation.preview.errors') }},
                        {{ count($model[1]['warnings']) }} {{ trans('validation.preview.warnings') }}
                        ,
                        {{ count($model[1]['info']) }} {{ trans('validation.preview.info') }}
                                    </span>

                    @if(count($model[1]['errors']) != 0
                    || count($model[1]['warnings']) != 0
                    || count($model[1]['info']) != 0)
                        <ul class="fa-ul">
                            @foreach($model[1]['errors']->messages() as $errors)
                                @foreach($errors as $error)
                                    <li style="color:#cc0000">
                                        <i class="fa-li fa fa-times-circle"></i>
                                        {{$error}}
                                    </li>
                                @endforeach
                            @endforeach

                            @foreach($model[1]['warnings']->messages() as $warnings)
                                @foreach($warnings as $warning)
                                    <li style="color: #ffa057">
                                        <i class="fa-li fa fa-exclamation-circle"
                                           aria-hidden="true"></i>
                                        {{$warning}}
                                    </li>
                                @endforeach
                            @endforeach

                            @foreach($model[1]['info']->messages() as $msg)
                                @foreach($msg as $info)
                                    <li style="color: #4169E1">
                                        <i class="fa-li fa fa-info-circle" aria-hidden="true"></i>
                                        {{$info}}
                                    </li>
                                @endforeach
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>