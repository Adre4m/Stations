@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('stations.title') }}
                    </div>
                    <div class="panel-body">
                        <a href="{{ route('stations.index') }}">
                            <button class="btn btn-default">
                                <i class="fa fa-level-down fa-rotate-90"></i>
                            </button>
                        </a>
                        <a href="/">
                            <button class="btn btn-{{ count($messages['exceptions']) == 0 ? "success" : "warning" }}">
                                <i class="fa fa-{{ count($messages['exceptions']) == 0 ? "check" : "warning" }}"></i>
                                {{ trans('stations.confirm') }}
                            </button>
                        </a>
                        <div>
                            <strong>Exceptions :</strong>
                            <ul class="fa-ul">
                                @if(isset($messages['exceptions']) && count($messages['exceptions']) != 0)
                                    @foreach($messages['exceptions'] as $exception)
                                        <li style="color:#cc0000">
                                            <i class="fa-li fa fa-times-circle" aria-hidden="true"></i>
                                            {{ $exception }}
                                        </li>
                                    @endforeach
                                @else
                                    <li style="color: #6cad49">
                                        <i class="fa-li fa fa-check-circle"></i>
                                        Fichier lu correctement
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <div>
                            <strong>Validation :</strong>
                            <ul class="fa-ul">
                                @foreach($messages['models'] as $model)
                                @if(count($model[1]['errors']) != 0)
                                    <li style="color:#cc0000">
                                    <i class="fa-li fa fa-times-circle"></i>
                                @elseif(count($model[1]['warnings']) != 0)
                                    <li style="color: #ffa057">
                                    <i class="fa-li fa fa-exclamation-circle" aria-hidden="true"></i>
                                @elseif(count($model[1]['info']) != 0)
                                    <li style="color: #4169E1">
                                    <i class="fa-li fa fa-info-circle" aria-hidden="true"></i>
                                @else
                                    <li>
                                    <i class="fa-li fa fa-check"></i>
                                @endif
                                        Station {{ $model[0]->code }}
                                        <span style="float:right">
                                            {{ count($model[1]['errors'])}} erreurs,
                                            {{ count($model[1]['warnings']) }} avertissements,
                                            {{ count($model[1]['info']) }} informations
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection