
@can('edit', $contributor)
    <a href="{{route('contributors.edit', $contributor->id)}}">
        <button class="btn btn-warning" type="button"><i class="fa fa-edit"></i></button>
    </a>
@else
        <button class="btn btn-default" style="background-color: #aeaeae; color: #5e5e5e" type="button"><i class="fa fa-edit"></i></button>
@endcan

@can('destroy', $contributor)
    <a href="{{route('contributors.destroy', $contributor->id)}}">
        <button class="btn btn-danger" type="button"><i class="fa fa-trash"></i></button>
    </a>
@else
        <button class="btn btn-default" style="background-color: #aeaeae; color: #5e5e5e" type="button"><i class="fa fa-trash"></i></button>
@endcan