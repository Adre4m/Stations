
@can('edit', $station)
    <a href="{{route('stations.edit', $station->id)}}">
        <button class="btn btn-warning" type="button"><i class="fa fa-btn fa-edit"></i>{{trans('stations.edit')}}</button>
    </a>
@endcan

@cannot('edit', $station)
        <button class="btn btn-default" style="background-color: #aeaeae; color: #5e5e5e" type="button"><i class="fa fa-btn fa-edit"></i>{{trans('stations.edit')}}</button>
@endcannot

@can('destroy', $station)
    <a href="{{route('stations.destroy', $station->id)}}">
        <button class="btn btn-danger" type="button"><i class="fa fa-btn fa-trash"></i>{{trans('stations.destroy')}}</button>
    </a>
@endcan

@cannot('destroy', $station)
        <button class="btn btn-default" style="background-color: #aeaeae; color: #5e5e5e" type="button"><i class="fa fa-btn fa-trash"></i>{{trans('stations.destroy')}}</button>
@endcannot