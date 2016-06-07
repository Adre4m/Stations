
@can('edit', $network)
    <a href="{{route('networks.edit', $network->id)}}">
        <button class="btn btn-warning" type="button"><i class="fa fa-edit"></i></button>
    </a>
@endcan

@cannot('edit', $network)
        <button class="btn btn-default" style="background-color: #aeaeae; color: #5e5e5e" type="button"><i class="fa fa-edit"></i></button>
@endcannot

@can('destroy', $network)
    <a href="{{route('networks.destroy', $network->id)}}">
        <button class="btn btn-danger" type="button"><i class="fa fa-trash"></i></button>
    </a>
@endcan

@cannot('destroy', $network)
        <button class="btn btn-default" style="background-color: #aeaeae; color: #5e5e5e" type="button"><i class="fa fa-trash"></i></button>
@endcannot