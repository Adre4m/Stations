
@can('edit', $station)
    <a href="{{route('stations.edit', $station->id)}}">
        <button class="btn btn-warning" type="button"><i class="fa fa-edit"></i></button>
    </a>
@else
        <button class="btn btn-default" style="background-color: #aeaeae; color: #5e5e5e" type="button"><i class="fa fa-edit"></i></button>
@endcan

@can('destroy', $station)
    <a href="{{route('stations.destroy', $station->id)}}">
        <button class="btn btn-danger" type="button"><i class="fa fa-trash"></i></button>
    </a>
@else
        <button class="btn btn-default" style="background-color: #aeaeae; color: #5e5e5e" type="button"><i class="fa fa-trash"></i></button>
@endcan