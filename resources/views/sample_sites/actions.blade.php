
@can('edit', $sample_site)
    <a href="{{route('sample_sites.edit', $sample_site->code)}}">
        <button class="btn btn-warning" type="button"><i class="fa fa-btn fa-edit"></i>{{trans('sample_sites.edit')}}</button>
    </a>
@endcan

@cannot('edit', $sample_site)
        <button class="btn btn-default" style="background-color: #aeaeae; color: #5e5e5e" type="button"><i class="fa fa-btn fa-edit"></i>{{trans('sample_sites.edit')}}</button>
@endcannot

@can('destroy', $sample_site)
    <a href="{{route('sample_sites.destroy', $sample_site->code)}}">
        <button class="btn btn-danger" type="button"><i class="fa fa-btn fa-trash"></i>{{trans('sample_sites.destroy')}}</button>
    </a>
@endcan

@cannot('destroy', $sample_site)
        <button class="btn btn-default" style="background-color: #aeaeae; color: #5e5e5e" type="button"><i class="fa fa-btn fa-trash"></i>{{trans('sample_sites.destroy')}}</button>
@endcannot