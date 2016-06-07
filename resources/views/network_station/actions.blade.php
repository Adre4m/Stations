
@can('edit', $network_station)
    <a href="{{route('network_station.edit', $network_station->id)}}">
        <button class="btn btn-warning" type="button"><i class="fa fa-edit"></i></button>
    </a>
@else
        <button class="btn btn-default" style="background-color: #aeaeae; color: #5e5e5e" type="button"><i class="fa fa-edit"></i></button>
@endcan

@can('destroy', $network_station)
    <a href="{{route('network_station.destroy', $network_station->id)}}">
        <button class="btn btn-danger" type="button"><i class="fa fa-trash"></i></button>
    </a>
@else
        <button class="btn btn-default" style="background-color: #aeaeae; color: #5e5e5e" type="button"><i class="fa fa-trash"></i></button>
@endcan