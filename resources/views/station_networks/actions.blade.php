
@can('edit', $station_network)
    <a href="{{route('station_networks.edit', $station_network->id)}}">
        <button class="btn btn-warning" type="button"><i class="fa fa-btn fa-edit"></i>{{trans('station_networks')}}</button>
    </a>
@endcan

@cannot('edit', $station_network)
        <button class="btn btn-default" style="background-color: #aeaeae; color: #5e5e5e" type="button"><i class="fa fa-btn fa-edit"></i>{{trans('station_networks.edit')}}</button>
@endcannot

@can('destroy', $station_network)
    <a href="{{route('station_networks.destroy', $station_network->id)}}">
        <button class="btn btn-danger" type="button"><i class="fa fa-btn fa-trash"></i>{{trans('station_networks')}}</button>
    </a>
@endcan

@cannot('destroy', $station_network)
        <button class="btn btn-default" style="background-color: #aeaeae; color: #5e5e5e" type="button"><i class="fa fa-btn fa-trash"></i>{{trans('station_networks')}}</button>
@endcannot