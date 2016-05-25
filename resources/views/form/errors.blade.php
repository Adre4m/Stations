@if ($errors->has($name))
    <div class="alert alert-danger">
        @foreach($errors->get($name) as $error)
            <strong>{{ $error }}</strong>
        @endforeach
    </div>
@endif
@if ($warnings->has($name))
    <div class="alert alert-warning">
        @foreach($warnings->get($name) as $warning)
            <strong>{{ $warning }}</strong>
        @endforeach
    </div>
@endif