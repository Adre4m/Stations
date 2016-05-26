@if (count($messages))
    @foreach($messages as $message)
        @if(isset($messages['errors']))
            @foreach($message['errors'] as $errors)
                <div class="alert alert-danger">
                    @foreach($errors->get($name) as $error)
                        <strong>{{ $error }}</strong>
                    @endforeach
                </div>
            @endforeach
        @endif
        @if(isset($messages['warnings']))
            @foreach($message['warnings'] as $warnings)
                <div class="alert alert-danger">
                    @foreach($warnings->get($name) as $warning)
                        <strong>{{ $warning }}</strong>
                    @endforeach
                </div>
            @endforeach
        @endif
        @if(isset($messages['info']))
            @foreach($message['info'] as $info)
                <div class="alert alert-danger">
                    @foreach($info->get($name) as $var)
                        <strong>{{ $var }}</strong>
                    @endforeach
                </div>
            @endforeach
        @endif
    @endforeach
@endif