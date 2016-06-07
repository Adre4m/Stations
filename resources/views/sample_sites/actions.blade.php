
@can('edit', $sample_site)
    <a href="{{route('sample_sites.edit', $sample_site->id)}}">
        <button class="btn btn-warning" type="button"><i class="fa fa-edit"></i></button>
    </a>
@else
        <button class="btn btn-default" style="background-color: #aeaeae; color: #5e5e5e" type="button"><i class="fa fa-edit"></i></button>
@endcan

@can('destroy', $sample_site)
    <a href="{{route('sample_sites.destroy', $sample_site->id)}}">
        <button class="btn btn-danger" type="button"><i class="fa fa-trash"></i></button>
    </a>
@else
        <button class="btn btn-default" style="background-color: #aeaeae; color: #5e5e5e" type="button"><i class="fa fa-trash"></i></button>
@endcan