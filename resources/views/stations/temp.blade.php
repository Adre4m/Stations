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
                                <i class="fa fa-arrow-left"></i>
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
                            <ul>
                                @if(isset($messages['exceptions']) && count($messages['exceptions']) != 0)
                                    @foreach($messages['exceptions'] as $exception)
                                        <li class="alert alert-danger">
                                            tableau
                                            {{ $exception }}
                                        </li>
                                    @endforeach
                                @else
                                    <li class="alert alert-success">
                                        Fichier lu correctement
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <div>
                            <strong>Validation :</strong>
                            <ul>
                                @foreach($messages['models'] as $model)
                                @if(count($model[1]['errors']) != 0)
                                    <li class="alert alert-danger">
                                @elseif(count($model[1]['warnings']) != 0)
                                    <li class="alert alert-warning">
                                @elseif(count($model[1]['info']) != 0)
                                        <li class="alert alert-info">
                                @else
                                        <li class="alert alert-success">
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